<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recibo de nómina</title>
  <style>
    /** Define the margins of your page **/
    @page {
      margin: 40px 25px;
    }

    @font-face {
      font-family: "Montserrat";
      font-style: normal;
      font-weight: normal;
      src: url('{{storage_path()}}/fonts/Montserrat/Montserrat-Regular.ttf') format('truetype');
    }

    @font-face {
      font-family: "Montserrat";
      font-style: normal;
      font-weight: bold;
      src: url('{{storage_path()}}/fonts/Montserrat/Montserrat-Bold.ttf') format('truetype');

    }

    @font-face {
      font-family: "Montserrat";
      src: url('{{storage_path()}}/fonts/Montserrat/Montserrat-Italic.ttf') format('truetype');
      font-style: italic;
    }

    @font-face {
      font-family: "Montserrat";
      src: url('{{storage_path()}}/fonts/Montserrat/Montserrat-BoldItalic.ttf') format('truetype');
      font-weight: bold;
      font-style: italic;
    }

    html,
    body {
      font-size: 11px;
      font-family: 'Montserrat';
      font-style: normal;
      padding: 0px 0px 0px 0px !important;
    }

    p,
    li {
      font-family: 'Montserrat';
      font-style: normal;
    }

    header {
      position: fixed;
      top: -30px;
      left: 0px;
      right: 0px;
      height: 50px;
      width: 100%;

    }

    footer {
      position: fixed;
      bottom: -60px;
      left: 0px;
      right: 0px;
      height: 50px;

      background-color: #ffffff;
      color: black;
      text-align: right;
      line-height: 35px;
    }

    p,
    li {
      font-family: 'Montserrat';
      font-style: normal;
      font-size: 11px;
      padding: 3px;

    }

    table,
    td,
    th {
      border: 0px solid black;
      font-size: 11px;
      padding: .1em;
      text-align: left;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      font-family: 'Montserrat';
      font-style: normal;
      font-weight: normal;
      font-size: 11px;
      border: none;
    }

    hr {
      border: 1px solid #670f0f;
    }

    h4 {
      padding: 1px 2px;
      margin-bottom: 2px;
      margin-top: 2px;
    }

    .table-small-padding th,
    .table-small-padding td {
      padding: none;
    }
    .text-small {
      font-size: 9px !important;
    }

    .tb-border td,
    .tb-border th {
      border: 1px solid #ddd;
    }

    .border-b {
      border-bottom: 1px solid #000 !important;
    }

    .bg-carmin {
      background-color: #670f0f;
      color: white;
    }

    .bg-light-grey {
      background-color: #fafafa;
    }

    .bg-dark-grey {
      background-color: #ddd;
    }

    .text-center {
      text-align: center !important;
    }

    .text-right {
      text-align: right !important;
    }
  </style>
</head>

<body>
  <header>
    <h3 class="text-center bg-carmin"> RECIBO DE NÓMINA </h3>
  </header>
  <main>
    <table style="width:100%;">
      <tr>
        <td>
          <h3>Centro de Investigación e Innovación en Tecnologías de la
            Información y Comunicación</h3>
        </td>
        <td class="text-right">
          <img src="data:image/png;base64,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" width="200px">
        </td>
      </tr>
    </table>
    <table class="table-small-padding" style="width:50%;">
      <tr>
        <td>
          <small>Avenida San Fernando No. 37, Col. Toriello Guerra,Tlalpan, Ciudad de México, México, C.P. 14050</small>
        </td>
      </tr>
      <tr>
        <td><small>RFC: FID741230A22</small></td>
      </tr>
      <tr>
        <td><small>Personas Morales con Fines no Lucrativos</small></td>
      </tr>
      <tr>
        <td><small>Registro Patronal IMSS: B1212338102</small></td>
      </tr>
    </table>
    <br>
    <table class="tb-border" style="width:100%">
      <tr>
        <th>No. Trabajador:</th>
        <td>{{ $data->code }}&nbsp;&nbsp;</td>
        <th>Depto:</th>
        <td>{{ $data->employment->unit->name }}</td>
      </tr>
      <tr>
        <th>Nombre: </th>
        <td>{{ $data->name }} &nbsp;&nbsp;</td>
        <th>Puesto:</th>
        <td>{{ $data->employment->position->name }} N22</td>
      </tr>
      <tr>
        <th>CURP:</th>
        <td>{{ $data->curp }} &nbsp;&nbsp;</td>
        <th>No. Nómina:</th>
        <td>16</td>
      </tr>
      <tr>
        <th>RFC: </th>
        <td>{{ $data->rfc }} &nbsp;&nbsp;</td>
        <th>Periodo:</th>
        <td>16/Ago/2020 al 31/Ago/2020</td>
      </tr>
    </table>
    <table style="table-layout: fixed; word-break: break-all;">
      <thead>
        <tr width="100%">
          <th class="bg-carmin" colspan="3">
            <span> <center>PERCEPCIONES</center> </span>
          </th>
          <th class="bg-carmin" colspan="3">
            <span> <center>DEDUCCIONES</center> </span>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-dark-grey">
          <td width=10%>P001</td>
          <td width=30%>Sueldo</td>
          <td width=10% class="text-right">3, 518.00</td>
          <td width=10%>D001</td>
          <td width=30%>ISR</td>
          <td width=10% class="text-right">3000.00</td>
        </tr>
        <tr class="bg-light-grey">
          <td width=10%>P001</td>
          <td width=30%>Sueldo</td>
          <td width=10% class="text-right">3, 518.00</td>
          <td width=10%>D001</td>
          <td width=30%>ISR</td>
          <td width=10% class="text-right">3000.00</td>
        </tr>
        <tr class="bg-dark-grey">
          <td width=10%>P001</td>
          <td width=30%>Sueldo</td>
          <td width=10% class="text-right">3, 518.00</td>
          <td width=10%>D001</td>
          <td width=30%>ISR</td>
          <td width=10% class="text-right">3000.00</td>
        </tr>
      </tbody>
    </table>
    <br>
    <br>
    <hr>
    <table class="table-small-padding" style="table-layout: fixed; word-break: break-all;">
      <colgroup>
        <col width="10%" />
        <col width="10%" />
        <col width="10%" />
        <col width="10%" />
        <col width="10%" />
        <col width="10%" />
      </colgroup>
      <tr>
        <td></td>
        <td>Total Percepciones</td>
        <td class="text-right">19,690.03</td>
        <td></td>
        <td>Total Deducciones</td>
        <td class="text-right">4,516.57</td>
      </tr>
      <tr>
        <td></td>
        <td>Neto Pagado</td>
        <td class="text-right">15,173.46</td>
      </tr>
      <tr>
        <td></td>
        <td>Total en Efectivo</td>
        <td class="text-right">15,173.46</td>
        <td></td>
        <td colspan="3" class="text-right"> Firma: ____________________________</td>
      </tr>
    </table>
    <div class="bg-carmin">
      <center><b> COMPROBANTE FISCAL DIGITAL POR INTERNET </b></center>
    </div>
    <table class="table-small-padding text-small" style="width:100%">
      <tr>
        <th>Folio Fiscal:</th>
        <td>12345678-1234-1234-1234-123456789123</td>
        <th>Lugar de emisión:</th>
        <td>14050</td>
      </tr>
      <tr>
        <th>Fecha y hora de certificación: </th>
        <td>2020-08-30T17:51:23</td>
        <th>Fecha y hora de emisión:</th>
        <td>2020-08-30T17:51:23</td>
      </tr>
      <tr>
        <th>No. de Serie del CSD del SAT:</th>
        <td>00010000000501960426</td>
        <th>No. de serie del CSD del emisor: </th>
        <td>000100000412515490</td>
      </tr>
      <tr>
        <th>Forma de pago: </th>
        <td>Por definir</td>
        <th>Serie y Folio interno</th>
        <td>NOMINA2959</td>
      </tr>
    </table> <br>
    <table class="text-small table-small-padding" style="width:100%;">
      <tr>
        <td class="text-center">
          <img src="https://imgssl.constantcontact.com/kb/qr-code-standard-example.png" height="120px">
        </td>
        <td>
          <table>
            <tr>
              <th>Total percepciones: </th>
              <td class="text-right">19, 690.03</td>
            </tr>
            <tr>
              <td colspan="2">
                <hr>
              </td>
            </tr>
            <tr>
              <th>Total otros pagos: </th>
              <td class="text-right">0.0 +</td>
            </tr>
            <tr>
              <th>&nbsp;&nbsp;&nbsp;&nbsp;Otros pagos: </th>
              <td class="text-right">0.0</td>
            </tr>
            <tr>
              <th>&nbsp;&nbsp;&nbsp;&nbsp;Subsidio efectivamente entregado al trabajador: </th>
              <td class="text-right"></td>
            </tr>
            <tr>
              <td colspan="2"><hr></td>
            </tr>
            <tr>
              <th>Total deducciones sin ISR: </th>
              <td class="text-right">888.06 -</td>
            </tr>
            <tr>
              <td colspan="2">
                <hr>
              </td>
            </tr>
            <tr>
              <th>ISR retenido: </th>
              <td class="text-right">3,628.51 -</td>
            </tr>
            <tr>
              <td colspan="2">
                <hr>
              </td>
            </tr>
            <tr>
              <th>Total: </th>
              <td class="text-right">15,173.46 = </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <br>
    <div class="text-small">
      <small> <b> Sello Digital del Contribuyente Emisor: </b></small><br>
      <small>f5tIWVsIos2Yu3BDLdBKRBjcdB8coAxecyVcXblUjIhxlfBreRqLqbRDNp3JCE1eb88QmOkvwSeJDadX doGlE/urlH9+cBizO64Usy/cIQHbdf/rRjVyhTLyJl7NXmL+L+B2NaIgRqBL9zsFzH4R6wkuceyFSEe+
        URc01XXDAA/pKjnvtgohRAfJ9it2omxiV1TRVXXJrLlUS165uuwOcAMqPKvqc76AxaphXATCWMZZ7376 gz8rxTvkAT53LKWpsH8DMkXwAzUFfCy6jr/e13XxQOi2U/OB0Ftv2icZFfcJEYxtUJ5J/W9GbCnn4sqf R7r5tdt9nHz02wA7/VVbxQ==</small>
    </div> <br>
    <div class="text-small">
      <small> <b> Sello digital del SAT: </b></small> <br>
      <small>HhhUEpd+926VBtR69fkRFzbDSLW3WuyRh/QEn4CR+Z+htyQT3dskg2i0bk9Owe8SG6whkKcY3rovGkQ4 LO/aMcuiJUiQL2yFxLT8T2pSLSFIDCAaoLdAGVVdhg96itZVhzwqNF2hhFC34gZRZu+EiYK0wk4HHkXH
        AQPpCWDv8r8RQaLU3U508mIED02KiUQOMK6eeQi0QtK3gbEojJQbtfkqFwR3RnuJGpjDSnh6ivZJ6yvM mbJpcTrpI+3egeQ9Dl4SW+9x2TSXEnalLe5l/r9PQznp69xS7e9yEEsnHFMWs4Ny20B4jaIsBFADB0oc
        iLEJ56RVVUCvSja+r56EwA==
      </small>
    </div>
    <div class="text-small">
      <small> <b> Cadena Original del complemento de certificación digital del SAT: </b></small> <br>
      <small>|1.1|5A3B7A50-5603-4641-BA00-76215D849819|2020-08-30T17:51:2 3|TSP080724QW6|f5tIWVsIos2Yu3BDLdBKRBjcdB8coAxecyVcXblUjIhxl fBreRqLqbRDNp3JCE1eb88QmOkvwSeJDadXdoGlE/urlH9+cBizO64Usy/cI
        QHbdf/rRjVyhTLyJl7NXmL+L+B2NaIgRqBL9zsFzH4R6wkuceyFSEe+URc01 XXDAA/pKjnvtgohRAfJ9it2omxiV1TRVXXJrLlUS165uuwOcAMqPKvqc76Ax aphXATCWMZZ7376gz8rxTvkAT53LKWpsH8DMkXwAzUFfCy6jr/e13XxQOi2U
        /OB0Ftv2icZFfcJEYxtUJ5J/W9GbCnn4sqfR7r5tdt9nHz02wA7/VVbxQ==| 00001000000501960426</small>
    </div> <br>
    <div class="text-small">
      <small> <b> Este documento es una representación impresa de un CFDI </b></small>
    </div>
  </main>

</body>

</html>
