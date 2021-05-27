<?php

namespace App\Utils;
use App\Models\Payment;
use App\Models\System\SystemPaymentConfig;
use App\Models\PaymentInvoice;

class CFDIPaymentValidator
{
    private $cfdi = [];
    private $payment;
    private $messages = [];
    private $cfg;

    public function __construct($cfdi, $paymentId)
    {
        $this->cfdi = $cfdi;
        $this->payment = Payment::find($paymentId);
        $this->cfg = SystemPaymentConfig::latest()->first();
    }

    public function getMessages(){
        return $this->messages;
    }

    private function getDescription(){
        $key = "";
        $project = $this->payment->contract->project;
        if($project->specific != "" && $project->specific != "0000") {
            $key = $project->specific;
        }else {
            $key = $project->project_key;
        }
        return str_replace("@key", $key, $this->cfg->description);
    }

    public function validate(){
        try{
            $cfdi = $this->cfdi;
            $payment = $this->payment;
            $dependency = $this->payment->contract->project->unit->dependency;
            $employee = $this->payment->employee;
            $payCfg = $this->cfg;
            
            /* PAYMENT CONFIGURATOR */
            if($cfdi['voucher']['MetodoPago'] != $payCfg->payment_method) {
                array_push($this->messages, 'El método de pago debe de ser ' . $payCfg->payment_method);
            }
            if($cfdi['voucher']['TipoDeComprobante'] != $payCfg->voucher_type) {
                array_push($this->messages, 'El tipo de factura debe de ser de ingreso');
            }
            if($cfdi['voucher']['Moneda'] != $payCfg->currency) {
                array_push($this->messages, 'La moneda debe ser ' .  $payCfg->currency);
            }
            if($cfdi['voucher']['FormaPago'] != $payCfg->payment_way) {
                array_push($this->messages, 'La forma de pago debe ser ' . $payCfg->payment_way);
            }

            if($cfdi['transmitter']['RegimenFiscal'] != $payCfg->tax_regime) {
                array_push($this->messages, 'El regimen fiscar debe de ser ' . $payCfg->tax_regime);
            }

            if($cfdi['receiver']['UsoCFDI'] !=  $payCfg->voucher_usage) {
                array_push($this->messages, 'El Uso de la factura debe de ser ' . $payCfg->voucher_usage);
            }

            if($cfdi['concepts']['Cantidad'] != $payCfg->qty) {
                array_push($this->messages, 'La cantidad debe de ser ' . $payCfg->qty);
            }
            if($cfdi['concepts']['ClaveUnidad'] != $payCfg->unity_key) {
                array_push($this->messages, 'La clave de unidad debe de ser ' . $payCfg->unity_key);
            }
            if(!static::compareStr($cfdi['concepts']['Unidad'] , $payCfg->unity)) {
                array_push($this->messages, 'La unidad debe de ser Actividad');
            }
            
            $description = $this->getDescription();
            if(!static::compareStr($cfdi['concepts']['Descripcion'] , $description)) {
                array_push($this->messages, 'La descripción debe de ser: ' . $description);
            }
            /* receiver */
            if($cfdi['receiver']['Rfc'] != $dependency->rfc) {
                array_push($this->messages, 'El RFC del receptor es incorrecto');
            }
            /*
                if(!static::compareStr($cfdi['receiver']['Nombre'], $dependency->fiscalName)) {
                    array_push($this->messages, 'El nombre fiscal del receptor debe de ser: ' .  $dependency->fiscalName);
                }
            */
            /* employee */
            if($cfdi['transmitter']['Rfc'] != $employee->rfc) {
                array_push($this->messages, 'El RFC no coincide con el del empleado');
            }
            
            if(!static::compareStr($cfdi['transmitter']['Nombre'] , $employee->getFullName())) {
                array_push($this->messages, 'El Nombre no coincide con el del empleado');
            }

            /* Payment */
            $centsAmount = static::toCents($cfdi['concepts']['ValorUnitario']);
            if(!static::compareAmounts($centsAmount , $payment->brute_amount)) {
                array_push($this->messages, 'El valor unitario es incorrecto');
            }

            $centsAmount = static::toCents($cfdi['voucher']['Total']);
            if(!static::compareAmounts($centsAmount , $payment->pay_amount)) {
                array_push($this->messages, 'El total de pago es incorrecto');
            }

            $centsAmount = static::toCents($cfdi['transferredTax']['Importe']);
            if(!static::compareAmounts($centsAmount ,$payment->iva_amount)) {
                array_push($this->messages, 'El importe del IVA trasladado no es correcto');
            }

            $centsAmount = static::toCents($cfdi['retTaxes']['iva']['Importe']);
            if(!static::compareAmounts($centsAmount ,$payment->iva_retention)) {
                array_push($this->messages, 'El importe del IVA  retenido no es correcto');
            }

            $centsAmount = static::toCents($cfdi['retTaxes']['isr']['Importe']);

            if(!static::compareAmounts($centsAmount, $payment->isr_retention)) {
                array_push($this->messages, 'El importe del ISR retenido no es correcto');
            }

            /* FIND IF THE INVOICE EXIST */
            $fiscalKey = $cfdi['complement']['UUID'];
            $invoice  = PaymentInvoice::where('fiscalKey',$fiscalKey)->first();
            if(isset($invoice->id)){
                array_push($this->messages, 'La factura con el folio fiscal ' . $fiscalKey. ' ya fue cargada anteriormente');
            }
        } catch(\Exception $e) {
            error_log(print_r($e->getMessage()), true);
            array_push($this->messages, "El archivo es inválido");
        }

        return count($this->messages) == 0;
    }

    private static function toCents($amount) {
        return floatval($amount) * 100;
    }
    
    private static function compareAmounts($am1,$am2){
        $am1 = floatval($am1);
        $am2 = floatval($am2);
        return abs($am1 - $am2) <= 3 || $am1 === $am2;
    }

    private static function compareStr($str1, $str2) {
        return mb_strtoupper($str1) == mb_strtoupper($str2);
    }

}
?>