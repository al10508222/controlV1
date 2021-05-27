<?php

namespace App\Http\Controllers\API\Admin\Catalogs;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Catalogs\CatDocument;
use App\Models\Catalogs\CatDocumentsContractType;

class DocumentController extends Controller
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
            $search = $request->input('search');
            $documents = CatDocument::search($search)->orderBy('created_at','desc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'documents' => $documents,
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $catDocument = new CatDocument();
            $catDocument->fill($request->all());
            $catDocument->save();
            $contractTypes = $request->input('contractTypes');
            foreach($contractTypes as $contractType){
                $document = new CatDocumentsContractType;
                $document->cat_contract_type_id = $contractType;
                $document->cat_document_id = $catDocument->id;
                $document->save();
            }
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
            $document = CatDocument::with('contractTypes.contract')->where('id',$id)->first();
            return response()->json([
                'success' => true,
                'document' => $document,
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
    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();
            $catDocument = CatDocument::find($id);
            $catDocument->fill($request->all());
            $catDocument->save();
            $contractTypes = $request->input('contractTypes');
            $deletedRows = CatDocumentsContractType::where('cat_document_id', $catDocument->id)->delete();
            foreach($contractTypes as $contractType){
                $document = new CatDocumentsContractType;
                $document->cat_contract_type_id = $contractType;
                $document->cat_document_id = $catDocument->id;
                $document->save();
            }
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
            CatDocument::where('id', $id)->delete();
            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo completar la acción',
            ], 500);
        }
    }
}
