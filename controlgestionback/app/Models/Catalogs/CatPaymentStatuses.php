<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatPaymentStatuses extends Model
{
    use HasFactory;

    const CREATED              = 1; // Status once assigned to PSP
    const APPROVED             = 2; // Status once AP (Project Administrator) aprovees bill and activity report
    const REFUSED              = 3; // Status if AP (Project Administrator) rejectes bill and activity report
    const PENDING              = 4; // Status once payment is sent to pay and assigned to an order
    const PAID                 = 5; // Status set once a payment is paid on the bank
    const UNPAID               = 6; // Status if the bank rejectes the payment
    const REPORT               = 7; // status with report activity
    const RH_REVIEW            = 8; // Status for the rh review 
    const COMPLEMENT_UPLOADED  = 9; // Status for the complement
    const REPORT_REFUSED       = 10; // 
    const FINISHED             = 11; // Status when all is over :) 

}
