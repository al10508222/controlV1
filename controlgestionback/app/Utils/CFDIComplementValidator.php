<?php

namespace App\Utils;
use App\Models\Payment;
use App\Models\System\SystemPaymentConfig;
use App\Models\PaymentInvoice;

class CFDIComplementValidator
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

    public function validate(){
        try {
            $cfdi = $this->cfdi;
            $payment = $this->payment;
            $dependency = $this->payment->contract->project->unit->dependency;
            $employee = $this->payment->employee;
            $payCfg = $this->cfg;
            
            /* PAYMENT CONFIGURATOR */
            
            
            /* receiver */
            if($cfdi['receiver']['Rfc'] != $dependency->rfc) {
                array_push($this->messages, 'El RFC del receptor es incorrecto');
            }

            /* employee */
            if($cfdi['transmitter']['Rfc'] != $employee->rfc) {
                array_push($this->messages, 'El RFC no coincide con el del empleado');
            }
        
            if(!static::compareStr($cfdi['transmitter']['Nombre'] , $employee->getFullName())) {
                array_push($this->messages, 'El Nombre no coincide con el del empleado');
            }

            /* Payment */

            $centsAmount = static::toCents($cfdi['complement']['ImpPagado']);
            if(!static::compareAmounts($centsAmount , $payment->pay_amount)) {
                array_push($this->messages, 'El total de pago es incorrecto');
            }

            /* FIND IF THE INVOICE EXIST */
            
            $invoice  = PaymentInvoice::where('payment_id', $this->payment->id)->first();
            if($cfdi['complement']['IdDocumento'] != $invoice->fiscalKey){
                array_push($this->messages, 'El complemento de pago debe de estar relacionado con la factura con folio: ' . $invoice->fiscalKey);
            }
        } catch(\Exception $e) {
            /// error_log(print_r($e->getMessage()), true);
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