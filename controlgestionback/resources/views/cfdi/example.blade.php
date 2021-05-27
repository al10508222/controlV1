@php
    $now = Carbon\Carbon::now();
@endphp
<cfdi:Comprobante  Version="3.3" Serie="{{ \Carbon\Carbon::parse($payroll->payment_period_start)->format('Y') }}" Folio="{{ $payroll->code}}" Fecha="{{$now->format('Y-m-d').'T'.$now->format('H:i:s')}}">
</cfdi:Comprobante>