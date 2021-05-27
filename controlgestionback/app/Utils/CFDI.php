<?php

namespace App\Utils;

class CFDI
{
    /**
     * Create a new CFDIValidator
     *
     * @return void
     */
    private $xmlPath;
    private $voucher = [];
    private $transmitter = [];
    private $receiver = [];
    private $concepts = [];
    private $transferredTax = [];
    private $retTaxes = [
        'iva' => [],
        'isr' => []
    ];
    private $complement = [];
    private $totalTaxes = [];

    public function __construct($xmlPath)
    {
        $this->xmlPath = $xmlPath;
    }

    /*
        Build the object
    */
    public function build() {
        try {
            error_log('Entro 1.');

            $strContenidoXML = file_get_contents($this->xmlPath);
            error_log(print_r($strContenidoXML, true));
            error_log('Entro 1.2');
            libxml_use_internal_errors(true); 
            error_log('Entro 1.2.1');
            $xml = new \SimpleXMLElement($strContenidoXML);
            error_log('Entro 1.3');
            $ns = $xml->getNamespaces(true);
            $xml->registerXPathNamespace('c', $ns['cfdi']);
            $xml->registerXPathNamespace('t', $ns['tfd']);
            error_log('Entro 1.5');
            /* voucher */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->voucher[$attrName] = strval($attrValue);
            }
            /* complemento */
            $noNodosRet = $xml->xpath("//t:TimbreFiscalDigital");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->complement[$attrName] = strval($attrValue);
            }
            error_log('Entro 2.');
            /* receiver */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante/cfdi:Receptor");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->receiver[$attrName] = strval($attrValue);
            }
            /* transmitter */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante/cfdi:Emisor");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->transmitter[$attrName] = strval($attrValue);
            }

            /* transmitter */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->concepts[$attrName] = strval($attrValue);
            }
            error_log('Entro 3.');
            /* transferredTax */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto/cfdi:Impuestos/cfdi:Traslados/cfdi:Traslado");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->transferredTax[$attrName] = strval($attrValue);
            }
            /* retTaxes */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante/cfdi:Conceptos/cfdi:Concepto/cfdi:Impuestos/cfdi:Retenciones/cfdi:Retencion");
            foreach($noNodosRet as $nodo){
                /* 002 is the IVA */
                foreach($nodo->attributes() as $attrName => $attrValue){
                    if(strval($nodo->attributes()['Impuesto']) == '002') {
                        $this->retTaxes['iva'][$attrName] = strval($attrValue);
                    }
                    else{
                        $this->retTaxes['isr'][$attrName] = strval($attrValue);
                    }
                }
            }
            error_log('Entro 4.');
            /* totalTaxes */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante/cfdi:Impuestos");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->totalTaxes[$attrName] = strval($attrValue);
            }
            error_log('Entro 5.');
        }catch(\Exception $e) {
            error_log(print_r($e->getMessage(), true));
        }

        return $this;
    }
    
    public function getAttributes() {
        return [
            'complement'     => $this->complement,
            'voucher'        => $this->voucher,
            'transmitter'    => $this->transmitter,
            'receiver'       => $this->receiver,
            'concepts'       => $this->concepts,
            'transferredTax' => $this->transferredTax,
            'totalTaxes'     => $this->totalTaxes,
            'retTaxes'       => $this->retTaxes
        ];
    }
}

?>