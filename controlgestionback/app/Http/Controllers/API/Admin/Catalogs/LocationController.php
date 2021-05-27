<?php

namespace App\Http\Controllers\API\Admin\Catalogs;

use Illuminate\Http\Request;
use App\Models\Catalogs\CatEmploymentLocation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Repositories\Location\LocationRepository;

class LocationController extends Controller
{
    protected $LocationRepo;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepo = $locationRepository;
    }

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
            $locatios = CatEmploymentLocation::search($search)->orderBy('created_at','desc')->paginate($rowsPerPage);
            return response()->json([
                'success' => true,
                'locations' => $locatios,
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
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $location = new CatEmploymentLocation();
            $location->fill($request->all());
            $location->save();
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
            $location = CatEmploymentLocation::find($id);
            return response()->json([
                'success' => true,
                'location' => $location,
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
        
        try{
            $location = CatEmploymentLocation::find($id)->update($request->except('id'));
                return response()->json([
                'location' => $location
           ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'No se pudo completar la acción: ' . $e->getMessage()
            ], 300);
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
            $this->locationRepo->delete($id);

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
