<?php

namespace App\Utils;

class CFDIComplement
{
    /**
     * Create a new CFDIValidator
     *
     * @return void
     */
    private $xmlPath;
    private $transmitter = [];
    private $receiver = [];
    private $voucher = [];
    private $complement = [];
    private $payment = [];
  

    public function __construct($xmlPath)
    {
        $this->xmlPath = $xmlPath;
    }

    /*
        Build the object
    */
    public function build() {
        try {
            $strContenidoXML = file_get_contents($this->xmlPath);
            $xml = new \SimpleXMLElement($strContenidoXML);
            $ns = $xml->getNamespaces(true);
            $xml->registerXPathNamespace('c', $ns['cfdi']);
            $xml->registerXPathNamespace('t', $ns['tfd']);
        
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
            /* Complement */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante/cfdi:Complemento/pago10:Pagos/pago10:Pago/pago10:DoctoRelacionado");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->complement[$attrName] = strval($attrValue);
            }
            /* voucher */
            $noNodosRet = $xml->xpath("/cfdi:Comprobante");
            foreach($noNodosRet[0]->attributes() as $attrName => $attrValue){
                $this->voucher[$attrName] = strval($attrValue);
            }

            return $this;
        } catch (\Exception $e) {
            
        }
        return $this;
    }
    
    public function getAttributes() {
        return [
            'transmitter'    => $this->transmitter,
            'receiver'       => $this->receiver,
            'voucher'        => $this->voucher,
            'complement'     => $this->complement
        ];
    }
}

?>