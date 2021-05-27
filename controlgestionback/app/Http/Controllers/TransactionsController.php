<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Transaction;
use Carbon\Carbon;
use DB;
use App\Models\PaymentTransaction;

class TransactionsController extends Controller
{

    public function index(Request $request)
    {
      try {
            $rowsPerPage = $request->input('rowsPerPage');
            $search = $request->input('search');
            $clients = PaymentTransaction::search($search)->orderBy('created_at','desc')->paginate($rowsPerPage);

            return response()->json([
                'success' => true,
                'binnacles' => $clients,
            ]);
      }catch (\Exception $e) {
        error_log($e->getMessage());
        return response()->json([
          'success' => false,
          'message' => 'Error'
        ]);
          }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $date = Carbon::now()->toDateString();


            $transaction = new Transaction();

            $transaction->user_id = auth()->user()->getAuthIdentifier();
            $transaction->fill($request->all());
            $transaction->save();

            DB::commit();

            return response()->json([
                'success' => true
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function test()
    {
        try {
            
                return 0;

            DB::commit();

            return response()->json([
                'success' => true
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
