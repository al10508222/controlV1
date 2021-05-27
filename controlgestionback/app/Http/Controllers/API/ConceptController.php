<?php

namespace App\Http\Controllers\API;

use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Core\StoreConceptPost;
use App\Models\Catalogs\CatConceptCalculationType;
use App\Models\Catalogs\CatPeriodicityType;
// Models
use App\Models\Concept;

class ConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $rowsPerPage = $request->input('rowsPerPage');
            $filter = json_decode($request->input('filter'));
            $concepts = Concept::with('concept_type')
                ->select('id', 'code', 'name', 'is_active', 'cat_concept_type_id')
                ->search($filter)
                ->orderBy('created_at','desc')
                ->paginate($rowsPerPage);

            return response()->json([
                'success' => true,
                'concepts' => $concepts,
			]);
        } catch (\Exception $e) {
            error_log($e->getMessage());
			return response()->json([
				'success' => false,
				'message' => 'Error'
			]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConceptPost $request)
    {
        try {
            if ($request->input('cat_concept_calculation_type_id') == CatConceptCalculationType::VARIABLE) {
                $this->validateExpression($request['core_expressions']);
            }
           
            DB::beginTransaction();
            $concept = new Concept();
            $data = $request->all();

            $concept->fill($data);
            $isTaxable = $concept->cat_concept_type_id == 1;
            if (!$isTaxable) $concept->taxable_type = null;
            $concept->save();

            $concept->tabulators()->sync($request['tabulators']);
            $concept->contracts()->sync($request['contracts']);
            $concept->dependencies()->sync($request['dependencies']);
            $concept->locations()->sync($request['locations']);

            foreach ($request['employees'] as $employeeJson) {
                $concept->employees()->attach($employeeJson['value']);
            }

            foreach ($request['exclude_employees'] as $employeeJson) {
                $concept->employees()->attach($employeeJson['value'], ['should_exclude' => true]);
            }

            foreach ($request['core_expressions'] as $key=>$expressionJson) {
                $concept->core_expressions()->attach($expressionJson['id'], ['expression_index' => $key]);
            }

            DB::commit();

            return response()->json([
				'success' => true,
				'message' => '',
			], 200);

        } catch (\Exception $e) {
            DB::rollback();
            error_log($e->getMessage());
			return response()->json([
				'success' => false,
				'message' => ''
			]);
        }
    }

    private function validateExpression($tokens)
    {
        $expr = '';
        foreach ($tokens as $token) {
            $expr .= $token['cat_core_expression_type_id'] == 1 || $token['cat_core_expression_type_id'] == 4 ? $token['name'] : '(1)';
        }

        $errMsg = 'La expresión está mal formada.';
        try {
            $expr = str_replace(';', '', $expr);
            if(!preg_match('/^([0-9\.\+\-\*\/\(\)]+)$/', $expr)) throw new \Exception($errMsg); # Token check
            eval("return $expr;"); # Syntax & Semantic check
        } catch (\Error | \Exception $e) {
            error_log($e->getMessage());
            throw new \Exception($errMsg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $concept = Concept::with(
                'concept_type',
                'tabulators',
                'contracts',
                'dependencies',
                'locations',
                'employees',
                'core_expressions',
                'conditionExpression'
            )->where('id', $id)->first();

            return response()->json([
                'success' => true,
                'concept' => $concept
            ]);

        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Ha ocurrido un error'
            ]);
        }
    }

    public function patch(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $concept = Concept::find($id)
                ->update($request->all());
            DB::commit();
            return response()->json([
                'message' => 'Concepto actualizado.'
            ]);
        } catch (\Exception | \Error $e) {
            DB::rollback();
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreConceptPost $request, $id)
    {
        try {
            if ($request->input('cat_concept_calculation_type_id') == CatConceptCalculationType::VARIABLE) {
                $this->validateExpression($request['core_expressions']);
            }
            
            DB::beginTransaction();
            $concept = Concept::find($id);
            $data = $request->all();
            
            $concept->cat_specific_budget_item_id = $request->input('cat_specific_budget_item_id');
            $concept->fill($data);

            $isTaxable = $concept->cat_concept_type_id == 1;
            if (!$isTaxable) $concept->taxable_type = null;
            $concept->save();

            $concept->tabulators()->sync($request['tabulators']);
            $concept->contracts()->sync($request['contracts']);
            $concept->dependencies()->sync($request['dependencies']);
            $concept->locations()->sync($request['locations']);

            // Detach all employees before reataching
            $concept->employees()->detach();
            // NOTE: when using quasar use-input along with emit-value, select emits the whole object
            foreach ($request['employees'] as $employeeJson) {
                $concept->employees()->attach($employeeJson['value']);
            }

            foreach ($request['exclude_employees'] as $employeeJson) {
                $concept->employees()->attach($employeeJson['value'], ['should_exclude' => true]);
            }

            $concept->core_expressions()->detach();
            foreach ($request['core_expressions'] as $key=>$expressionJson) {
                $concept->core_expressions()->attach($expressionJson['id'], ['expression_index' => $key]);
            }

            DB::commit();

            return response()->json([
				'success' => true,
				'message' => '',
            ], 200);

        } catch (\Exception $e) {
            \Safe\error_log($e->getMessage());
            DB::rollback();
            return response()->json([
				'success' => false,
				'message' => 'Error fatal x_x'
			]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $res = Concept::where( 'id', $id)->delete();
            return response()->json([
				'success' => $res,
				'message' => '',
			], 200);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
				'success' => false,
				'message' => 'Ha ocurrido un error'
			]);
        }
    }

    public function getExtraordinary(Request $request) {
        try {
            $rowsPerPage = $request->input('rowsPerPage');
            $filter = json_decode($request->input('filter'));

            $concepts = Concept::where('cat_periodicity_type_id', CatPeriodicityType::EXTRAORDINARY)
                ->search($filter)
                ->orderBy('created_at', 'desc')
                ->paginate($rowsPerPage);
                
            return response()->json([
                'success' => true,
                'concepts' => $concepts,
            ]);
            
        } catch(\Exception $e) {
            error_log($e->getMessage());
            return response()->json([
				'success' => false,
				'message' => 'Ha ocurrido un error'
			]);
        }
    }
}
