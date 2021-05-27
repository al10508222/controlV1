<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


    <title>Recibo de nómina</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
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
            src: url('{{storage_path()}}/fonts//Montserrat/Montserrat-Bold.ttf') format('truetype');

        }

        @font-face {
            font-family: "Montserrat";
            src: url('{{storage_path()}}/fonts//Montserrat/Montserrat-Italic.ttf') format('truetype');
            font-style: italic;
        }

        @font-face {
            font-family: "Montserrat";
            src: url('{{storage_path()}}/fonts//Montserrat/Montserrat-BoldItalic.ttf') format('truetype');
            font-weight: bold;
            font-style: italic;
        }

        html, body {
            font-family: 'Montserrat';
            font-style: normal;
            padding: 0px 0px 0px 0px !important;
        }

        p, li {
            font-family: 'Montserrat';
            font-style: normal;
        }

        header {
            position: fixed;
            top: -60px;
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

        p, li {
            font-family: 'Montserrat';
            font-style: normal;
            font-size: 12px;
            padding: 3px;

        }

        table, td, th {
            border: 0px solid black;
            font-size: 12px;

        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
        }
    </style>
</head>
<body>
<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
                $font = $fontMetrics->get_font("sans-serif", "italic");
                $size = 8;
                $pageText = "Página " . $PAGE_NUM . " de " . $PAGE_COUNT;
                $y = 760;
                $x = 280;
                $pdf->text($x, $y, $pageText, $font, $size, array(0,0,0));
        ');
    }
</script>
<!-- Define header and footer blocks before your content -->
<header>
    <!-- <table border="0" style="width:100%;">
        <tr>
            <td align="center" style="padding:20px;">
             <img src="img/amex.png" width="500px">
            </td>
        </tr>
    </table> -->
</header>
<br>
<br>
<br>
<table>
    <thead>
    <tr>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th align="right"><b
                    style="border-style: solid; padding:3px;">Registro: 5</b>
        </th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th align="right">Fecha: <b style="text-decoration: underline;"> 4 de Febrero de 2020  </b></th>
    </tr>
    </tfoot>
</table>

<p><b>Programa "Jóvenes Construyendo el Futuro" en la República de El Salvador</b></p>

<p><b>I. DATOS GENERALES DE LA INSTITUCIÓN, EMPRESA, U ORGANIZACIÓN</b></p>

<table>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important;">
            <font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Tipo de organización</b></font></td>
        <td style="width:60% !important">&nbsp;&nbsp;Chida</td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Razón
                    social</b></font></td>
        <td style="width:60% !important">&nbsp;&nbsp;INFOTEC</td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Nombre
                    del patrón o representante legal</b>
                <b>&nbsp;&nbsp;de la empresa o institución </b></font></td>
        <td style="width:60% !important">&nbsp;
            Brandon &nbsp;
            Uriel &nbsp;
            Perez &nbsp;
            Ramírez &nbsp;
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Colonia</b></font>
        </td>
        <td style="width:60% !important">
            &nbsp;&nbsp; Pomero rubio</td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Telefono
                    (s) Celular</b></font></td>
        <td style="width:60% !important">&nbsp;&nbsp; {{ isset($data->person) ? $data->person->mobile_phone : ''}}</td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Correo</b></font>
        </td>
        <td style="width:60% !important">
            &nbsp;&nbsp; {{ isset($data->person->contactEmail) ? $data->person->contactEmail->email : ''}}</td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;No.
                    de empleados</b></font></td>
        <td style="width:60% !important">
            &nbsp;&nbsp; {{ isset($data->numberRange) ? $data->numberRange->name : ''}}</td>
    </tr>
</table>

<footer></footer>

<div style="page-break-after:always;"></div>
<br>
<br>
<table>
    <tr>
        <td style="width:40% !important;">
            <b>&nbsp;&nbsp;Actividad:</b></td>
        <td style="width:60% !important">&nbsp;&nbsp; <b style="text-decoration: underline;">COMERCIO AL POR MENOR</b>
        </td>
    </tr>
</table>
<div align="center">
    <b>CENTROS DE TRABAJO</b>
</div>

@if ($data->workcenters)
    <br>
	<?php $i = 0; ?>
    @foreach($data->workcenters as $key => $workcenter)
        <table>
            <tr>
                <td bgcolor="#670f0f" style="width:100% !important;">
                    <div align="center" style="border-style: solid; padding:2px;">
                        <font color="white" style="padding:1px;"><b>&nbsp;&nbsp;CENTRO DE TRABAJO {{$key + 1}}
                                :</b></font>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;">
                    <font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Nombre o identificador del centro de
                            trabajo</b></font></td>
                <td style="width:60% !important; border: 3px solid black;">
                    &nbsp;&nbsp;{{isset($workcenter) ? $workcenter->name : ''}}</td>
            </tr>
            <tr>
                <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;"><font color="white"
                                                                                                   style="padding:30px;"><b>&nbsp;&nbsp;Código
                            postal</b></font></td>
                <td style="width:60% !important; border: 3px solid black;">
                    &nbsp;&nbsp; {{isset($workcenter->postal_code) ? $workcenter->postal_code->code : ''}}</td>
            </tr>
            <tr>
                <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;">
                    <font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Municipio o Alcaldía</b></font></td>
                <td style="width:60% !important; border: 3px solid black;">
                    &nbsp;&nbsp; {{isset($workcenter->postal_code->catLocality) ? $workcenter->postal_code->catLocality->name : ''}} </td>
            </tr>
            <tr>
                <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;"><font color="white"
                                                                                                   style="padding:30px;"><b>&nbsp;&nbsp;Departamento</b></font></td>
                <td style="width:60% !important; border: 3px solid black;">
                    &nbsp;&nbsp; {{isset($workcenter->postal_code->catCountry) ? $workcenter->postal_code->catCountry->name : ''}} </td>
            </tr>
            <tr>
                <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;">
                    <font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Colonia</b></font></td>
                <td style="width:60% !important; border: 3px solid black;">
                    &nbsp;&nbsp; {{isset($workcenter->postal_code->catNeighborhood) ? $workcenter->postal_code->catNeighborhood->name : ''}} </td>
            </tr>
            <tr>
                <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;"><font color="white"
                                                                                                   style="padding:30px;"><b>&nbsp;&nbsp;Calle</b></font>
                </td>
                <td style="width:60% !important; border: 3px solid black;">
                    &nbsp;&nbsp; {{isset($workcenter) ? $workcenter->street : ''}} </td>
            </tr>
            <tr>
                <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;">
                    <font color="white" style="padding:30px;"><b>&nbsp;&nbsp;No. Ext</b></font></td>
                <td style="width:60% !important; border: 3px solid black;">
                    &nbsp;&nbsp;{{isset($workcenter) ? $workcenter->outdoor_number : ''}}</td>
            </tr>
            <tr>
                <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;"><font color="white"
                                                                                                   style="padding:30px;"><b>&nbsp;&nbsp;No.
                            Int</b></font></td>
                <td style="width:60% !important; border: 3px solid black;">
                    &nbsp;&nbsp; {{isset($workcenter) ? $workcenter->interior_number : ''}} </td>
            </tr>
        </table>

        @if (isset($workcenter->plans))
            <br>
			<?php $i = 0; ?>
            @foreach($workcenter->plans as $key => $plan)
                <table>
                    <tr>
                        <td colspan="2" bgcolor="#adacac" style="width:100% !important; border: 3px solid black;">
                            <center><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;PLAN DE
                                        CAPACITACIÓN {{$key + 1}}</b></font></center>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;"><font color="white"
                                                                                                           style="padding:30px;"><b>&nbsp;&nbsp;Número
                                    de jóvenes:</b></font></td>
                        <td style="width:60% !important; border: 3px solid black;">
                            &nbsp;&nbsp;{{isset($plan) ? $plan->numberYouthParticipate : ''}}</td>
                    </tr>
                    <tr>
                        <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;"><font color="white"
                                                                                                           style="padding:30px;"><b>&nbsp;&nbsp;Tipo
                                    de capacitación</b></font></td>
                        <td style="width:60% !important; border: 3px solid black;">
                            &nbsp;&nbsp;{{isset($plan->type) ? $plan->type->name : ''}}</td>
                    </tr>
                    <tr>
                        <td bgcolor="#adacac" style="width:40% !important; border: 3px solid black;">
                            <font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Escolaridad mínima</b></font></td>
                        <td style="width:60% !important; border: 3px solid black;">
                            &nbsp;&nbsp;{{isset($plan->minimum_schooling) ? $plan->minimum_schooling->name : ''}}</td>
                    </tr>
                </table>
            @endforeach
        @endif



    @endforeach
@endif


<br>
<div style="page-break-after:always;"></div>

<p><b>II. DATOS DE CONTACTO DE LA PERSONA QUE REGISTRA</b></p>

<table>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important;">
            <font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Nombre del representante ante el
                    programa</b><b>&nbsp;&nbsp;jóvenes construyendo el futuro</b></font></td>
        <td style="width:60% !important">
            &nbsp; &nbsp;
            {{isset($data->legal) ? $data->legal->name : ''}} &nbsp;
            {{isset($data->legal) ? $data->legal->secondName : ''}} &nbsp;
            {{isset($data->legal) ? $data->legal->thirdName : ''}}
            {{isset($data->legal) ? $data->legal->surName : ''}} &nbsp;
            {{isset($data->legal) ? $data->legal->secondSurName : ''}} &nbsp;
            {{isset($data->legal) ? $data->legal->thirdSurName : ''}} </td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Cargo</b></font>
        </td>
        <td style="width:60% !important">&nbsp;&nbsp; {{isset($data->legal) ? $data->legal->charge : ''}} </td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Teléfono
                    de contacto del representante</b>
                <b>&nbsp;&nbsp;de la empresa o institución </b></font></td>
        <td style="width:60% !important">&nbsp;&nbsp; {{isset($data->legal) ? $data->legal->telephone : '' }} </td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Celular
                    de contacto del representante</b></font></td>
        <td style="width:60% !important">&nbsp;&nbsp; {{isset($data->legal) ? $data->legal->cellphone : '' }} </td>
    </tr>
    <tr>
        <td bgcolor="#adacac" style="width:40% !important"><font color="white" style="padding:30px;"><b>&nbsp;&nbsp;Correo
                    electrónico del representante </b></font></td>
        <td style="width:60% !important">&nbsp;&nbsp;{{isset($data->legal) ? $data->legal->email : '' }}</td>
    </tr>
    <tr>
        <td colspan="2">
            <center><p>Nombre y Firma del representante</p><br>
                <p style="text-decoration: overline;">
                    &nbsp;
                    {{isset($data->legal) ? $data->legal->name : ''}} &nbsp;
                    {{isset($data->legal) ? $data->legal->secondName : ''}} &nbsp;
                    {{isset($data->legal) ? $data->legal->thirdName : ''}}
                    {{isset($data->legal) ? $data->legal->surName : ''}} &nbsp;
                    {{isset($data->legal) ? $data->legal->secondSurName : ''}} &nbsp;
                    {{isset($data->legal) ? $data->legal->thirdSurName : ''}}</p>
            </center>
        </td>
      </tr>
</table>

</body>
</html>
