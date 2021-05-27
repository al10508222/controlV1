<?php

namespace App\Http\Controllers\API;

use App\Models\ReportGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportGroupsController extends Controller
{
    public function index()
    {
        try {
            $groups = ReportGroup::with('sections.elements.catSection')->get();;
            return response()->json([
                'success' => true,
                'groups' => $groups,
            ]);
        }
        catch (Exception $e) {
            return $this->genResponse(400, null, $e->getMessage());
        }
   }
}