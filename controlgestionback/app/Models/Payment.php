<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'folio',
        'service_month',
        'service_year',
        'absenses',
        'brute_amount',
        'iva_amount',
        'subtotal',
        'iva_retention',
        'isr_retention',
        'total_amount',
        'minus',
        'pay_amount',
        'payment_day',
        'current_state',
        'last_state',
        'confirm_date',
        'contract_id',
        'employee_id'
    ];

    protected $with = ['invoice', 'employee', 'contract', 'complement', 'document', 'mounth'];

    public function unSetWith() {
        $this->with = [];
        return $this;
    }

    protected $appends  = ['hash'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getHashAttribute()
    {
        return encrypt( $this->id );
    }

    public function contract() {
        return $this->hasOne('App\Models\Contract', 'id', 'contract_id');
    }

    public function status() {
        return $this->hasOne('App\Models\Catalogs\CatPaymentStatuses', 'id', 'cat_payment_status_id');
    }

    public function responsable() {
        return $this->hasOne('App\Models\PaymentResponsable', 'payment_id', 'id');
    }
    
    public function month(){
        return $this->hasOne('App\Models\Catalogs\CatMonth' , 'id', 'service_month');
    }

    public function employee() {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }

    public function invoice(){
        return $this->hasOne('App\Models\PaymentInvoice');
    }

    public function complement(){
        return $this->hasOne('App\Models\PaymentComplement');
    }

    public function document(){
        return $this->hasOne('App\Models\PaymentDocument','payment_id','id');
    }

    public function mounth(){
        return $this->hasOne('App\Models\Catalogs\CatMonth','id','service_month');
    }

    
    public function Folio()
    {
      return "A0000" . $this->id;
    }

    public function scopeSearch($query, $search) {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {

                    // Where employee name
                    $q->whereHas('employee', function($q) use ($search) {
                        $q->where('name', 'like', '%'.$search.'%')
                            ->orWhere('lastname', 'like', '%'.$search.'%')
                                ->orWhere('second_lastname', 'like', '%'.$search.'%')
                                    ->orWhere('curp', 'like', '%'.$search.'%')
                                        ->orWhere('rfc', 'like', '%'.$search.'%');
                    });
                    // Where client name
                    $q->orWhereHas('contract.project.client', function($q) use ($search) {
                        $q->where('name', 'like', '%'.$search.'%')
                            ->orWhere('acronym', 'like', '%'.$search.'%');
                    });
                    // Where project key
                    $q->orWhereHas('contract.project', function($q) use ($search) {
                        $q->where('project_key', 'like', '%'.$search.'%');
                    });
                }
            });
        });
    }

    public function scopeAdvancedSearch($query, $filters) {
        return $query->when(!empty($filters), function ($query) use ($filters) {
            return $query->where(function($q) use ($filters)
            {
                $clients = [];
                $projects = [];
                if (isset($filters->keywords)) {
                    foreach ($filters->keywords as &$keyword) {
                        if ($keyword->type == "client") {
                            array_push($clients, $keyword->id);
                        } else if ($keyword->type == "project") {
                            array_push($projects, $keyword->id);
                        }
                    }
                }

                /* Filtering by client */
                $q->when(!empty($clients), function ($q) use ($clients) {
                    return $q->whereHas('contract.project.client', function($q) use ($clients) {
                        $q->whereIn('id', $clients);
                    });
                });

                /* Filtering by projects */
                $q->when(!empty($projects), function ($q) use ($projects) {
                    return $q->whereHas('contract.project', function($q) use ($projects) {
                        $q->whereIn('id', $projects);
                    });
                });

                /* Filtering by costs */
                $q->when($filters->maxCost != "", function ($q) use ($filters) {
                    return $q->where('total_amount', '>=', $filters->minCost*100)
                        ->where('total_amount', '<=', $filters->maxCost*100);
                });
                
                /* Filtering by months */
                $q->when(!empty($filters->selectedMonths), function ($q) use ($filters) {
                    return $q->whereIn('service_month', $filters->selectedMonths);
                });
                
                $q->when(!empty($filters->search), function($q) use ($filters) {
                    return $q->where(function($q) use ($filters) {
                        // Where employee name
                        $q->whereHas('employee', function($q) use ($filters) {
                            $q->where('name', 'like', '%'.$filters->search.'%')
                                ->orWhere('lastname', 'like', '%'.$filters->search.'%')
                                ->orWhere('second_lastname', 'like', '%'.$filters->search.'%')
                                ->orWhere('rfc', 'like', '%'.$filters->search.'%')
                                ->orWhere('curp', 'like', '%'.$filters->search.'%');
                        });

                        // Where client name
                        $q->orWhereHas('contract.project.client', function($q) use ($filters) {
                            $q->where('name', 'like', '%'.$filters->search.'%')
                                ->orWhere('acronym', 'like', '%'.$filters->search.'%');
                        });
                        // Where project key
                        $q->orWhereHas('contract.project', function($q) use ($filters) {
                            $q->where('project_key', 'like', '%'.$filters->search.'%');
                        });
                    });
                });
            });
        });
    }
}
