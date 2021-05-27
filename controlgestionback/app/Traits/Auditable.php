<?php


namespace App\Traits;


use App\Models\AuditLog;
use App\Models\Catalogs\CatModule;
use App\Models\CatAuditMovementType;
use Illuminate\Support\Facades\Auth;

trait Auditable
{
    public function audit($module, $movement_type, $object)
    {
        try {
            $module = CatModule::where('id', $module)->first();
            $movement_type = CatAuditMovementType::where('id', $movement_type)->first();
            
            $audit = new AuditLog;
            $audit->user = (object)['id' => Auth::user()->id, 'username' => Auth::user()->username];
            $audit->module = (object)['id' => $module->id, 'name' => $module->name];
            $audit->movement_type = (object)['id' => $movement_type->id, 'name' => $movement_type->name];
            $audit->object = json_decode(json_encode($object));
            $audit->save();
        } catch (\Exception $e) {
            \Safe\error_log($e);
        }
    }
}
