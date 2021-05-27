<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCertification extends Model
{
    use HasFactory;
    protected $table = "employee_certifications";

    protected $fillable = ['entity', 'name', 'description', 'start_date', 'end_date', 'expires', 'credential_id', 'url', 'file_id']; 
}
?>