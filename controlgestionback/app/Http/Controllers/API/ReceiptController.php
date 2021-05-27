<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Models\User;

class ReceiptController extends Controller
{
    public function generatePDF(){

        try {
                $data = User::all();
                $pdf = PDF::loadView('pdf_invoice', $data);
                return $pdf->stream('invoice.pdf',$data);
            // return response()->json([
			// 	'success' => true,
			// 	'message' => '',
			// ], 200);

        } catch (\Exception $e) {
			return response()->json([
				'success' => false,
				'message' => $e->getMessage()
			]);
        }

    }
}
