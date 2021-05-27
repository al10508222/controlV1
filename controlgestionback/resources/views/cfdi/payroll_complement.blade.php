@php
    $processedPayrollConfiguration = json_decode($processedPayroll->configuration, true);
    $key = array_search('SBC', array_column($processedPayrollConfiguration, 'name'));
    $sbc = $processedPayrollConfiguration[$key]["value"];
    $p_total_taxable = array_reduce($perceptions, function($carry, $item)
    {
        return $carry + $item['taxable_amount'];
    });

    $p_total_amount = array_reduce($perceptions, function($carry, $item)
    {
        return $carry + $item['amount'];
    });

    $p_total_exempt = $p_total_amount - $p_total_taxable;

    $total_other_deductions = NULL;
    $total_taxes = NULL;

    foreach($deductions as $deduction) {
        if ($deduction['sat_identifier'] != '002'){
            $total_other_deductions += $deduction['amount'];
        } else {
            $total_taxes += $deduction['amount'];
        }
    }
@endphp
<cfdi:Comprobante 
    Version="3.3" 
    Serie="{{ \Carbon\Carbon::parse($payroll->payment_period_start)->format('Y') }}" 
    Folio="{{ $payroll->code}}" Fecha="{{ $now->format('Y-m-d').'T'.$now->format('H:i:s')}}"
    FormaPago="99"
    SubTotal="{{ round($payroll->processed->total_amount_perceptions, 2) }}"
    Descuento="{{ round($payroll->processed->total_amount_deductions, 2) }}"
    Moneda="MXN"
    Total="{{round($payroll->processed->total_amount_perceptions, 2) - round($payroll->processed->total_amount_deductions, 2)}}"
    TipoDeComprobante="N"
    MetodoPago="PUE"
    LugarExpedicion="14050"
>
    <cfdi:Emisor 
        Rfc="FID741230A22"
        Nombre="INFOTEC CENTRO DE INVESTIGACIÓN E INNOVACION EN TECNOLOGIAS DE LA INFORMACIÓN Y COMUNICACION"
        RegimenFiscal="603"
    ></cfdi:Emisor>

    <cfdi:Receptor
        Rfc="{{ $employee->is_dead ? 'XAXX010101000' : $employee->rfc }}"
        Nombre="{{ $employee->full_name }}"
        UsoCFDI="P01"
    ></cfdi:Receptor>

    <cfdi:Conceptos>
        <cfdi:Concepto 
            ClaveProdServ="84111505"
            Cantidad="1"
            ClaveUnidad="ACT"
            Descripcion="Pago de nómina"
            ValorUnitario="{{ round($payroll->processed->total_amount_perceptions, 2) }}"
            Importe="{{ round($payroll->processed->total_amount_perceptions, 2) }}"
            Descuento="{{ round($payroll->processed->total_amount_deductions, 2) }}"
            ></cfdi:Concepto>
    </cfdi:Conceptos>
    <cfdi:Complemento>
        <nomina12:Nomina
            Version="1.2"
            TipoNomina="{{ $payroll->cat_periodicity_type_id == App\Models\Catalogs\CatPeriodicityType::EXTRAORDINARY ? 'E' : 'O' }}"
            FechaPago="{{ \Carbon\Carbon::parse($payroll->payment_date)->format('Y-m-d') }}"
            FechaInicialPago="{{ \Carbon\Carbon::parse($payroll->payment_period_start)->format('Y-m-d') }}"
            FechaFinalPago="{{ \Carbon\Carbon::parse($payroll->payment_period_end)->format('Y-m-d') }}"
            NumDiasPagados="{{ $payroll->period_days - $incidentCount }}"
            TotalPercepciones="{{ round($payroll->processed->total_amount_perceptions, 2) }}"
            TotalDeducciones="{{ round($payroll->processed->total_amount_deductions, 2) }}"
            TotalOtrosPagos="0"
        >
            <nomina12:Emisor
                RegistroPatronal="B1212338102"
            ></nomina12:Emisor>

            <nomina12:Receptor
                Curp="{{ $employee->curp }}"
                NumSeguridadSocial="{{ $employee->nss }}"
                FechaInicioRelLaboral="{{ \Carbon\Carbon::parse($firstEmployment->date)->format('Y-m-d') }}"
                Antigüedad="{{ $antiquity }}"
                TipoContrato="01"
                Sindicalizado="No"
                TipoJornada="03"
                TipoRegimen="02"
                NumEmpleado="{{ $employee->code }}"
                Departamento="{{ $currentEmployment->unit->name }}"
                Puesto="{{ $currentEmployment->position->name }}"
                RiesgoPuesto="1"
                PeriodicidadPago="{{ $payroll->catPeriodicity->sat_identifier }}"
                Banco="{{ $employee->account->bank->identifier }}"
                CuentaBancaria="{{$employee->account->clabe ? $employee->account->clabe : $employee->account->account}}"
                SalarioBaseCotApor="0.0"
                SalarioDiarioIntegrado="{{ $sbc }}"
                ClaveEntFed="{{$currentEmployment->location->GeoCatState->sat_identifier}}"
            ></nomina12:Receptor>
            
            <nomina12:Percepciones
                TotalSueldos="{{$p_total_amount}}"
                TotalExcento="{{$p_total_exempt}}"
                TotalGravado="{{$p_total_taxable}}"
            >
                @foreach ($perceptions as $perception)
                    <nomina12:Percepcion
                        TipoPercepción="{{$perception['sat_identifier']}}"
                        Clave="{{$perception['code']}}"
                        Concepto="{{$perception['name']}}"
                        ImporteGravado="{{$perception['taxable_amount']}}"
                        ImporteExcento="{{$perception['amount'] - $perception['taxable_amount']}}"
                    >
                    </nomina12:Percepcion>
                @endforeach
            </nomina12:Percepciones>
            <nomina12:Deducciones
                TotalOtrasDeducciones="{{$total_other_deductions}}"
                TotalImpuestosRetenidos="{{$total_taxes}}"
            >
                @foreach ($deductions as $deduction)
                    <nomina12:Deduccion
                        TipoDeduccion="{{$deduction['sat_identifier']}}"
                        Clave="{{$deduction['code']}}"
                        Concepto="{{$deduction['name']}}"
                        Importe="{{$deduction['amount']}}"
                    ></nomina12:Deduccion>
                @endforeach
            </nomina12:Deducciones>
        </nomina12:Nomina>
    </cfdi:Complemento>
</cfdi:Comprobante>