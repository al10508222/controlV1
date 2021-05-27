<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionsFieldRequest;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Catalogs\CatTabulator;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $rowsPerPage = $request->rowsPerPage;
            $search = $request->input('search');
            $positions = Position::with(['unit','tabulator'])->search($search)->orderBy('created_at','desc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'positions' => $positions,
			]);
        }catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
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
    public function store(PositionsFieldRequest $request)
    {
        try {

            DB::beginTransaction();
            $position = new Position();
            $position->fill($request->all());
            $position->save();
            DB::commit();

            return response()->json([
				'success' => true,
				'message' => '',
			], 200);

        } catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
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
            $position = Position::with(['tabulator','unit'])->where('id',$id)->first();
            return response()->json([
                'success' => true,
                'position' => $position,
			]);
        }catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionsFieldRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $position = Position::find($id);
            $position->fill($request->all());
            $position->save();
            DB::commit();

            return response()->json([
				'success' => true,
				'message' => '',
			], 200);

        } catch (\Exception $e) {
            DB::rollback();
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
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
            Position::destroy($id);
        } catch(\Exception | \Error $e) {
            \Safe\error_log($e);
            return response('',500);
        }
    }

    public function getPositionsBy(Request $request) {
        try {
            // TODO: Perform this query to convert it to a wherehas to avoid pluck
            error_log("getPositionsBy@PositionController");

            $data = $request->all();
            // Gets the id of all tabulators wich hiring type id is given
            $tabulators = CatTabulator::where('cat_contract_type_id',
                $request->input('cat_contract_type_id'))->pluck('id');

            $positions = Position::select('id', 'name')
                ->where('cat_unit_id', $request->input('cat_unit_id'))
                ->where('is_available', true)
                ->whereIn('cat_tabulator_id', $tabulators);
                
            if ($request->input('employee_positions') !== null) {
                $positions = $positions->whereNotIn('id', $request->input('employee_positions'));
            }

            $positions = $positions->get();
            
            return response()->json([
                'success' => true,
                'message' => '',
                'positions' => $positions
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
				'success' => false,
				'message' => 'Ha ocurrido un error'
			]);
        }
    }
}
