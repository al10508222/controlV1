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
                margin: 20px 25px;
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
                font-size: 13px;
                padding: .1em;
                text-align: left;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: normal;
                font-size: 15px;
                border: none;
            }

            hr {
                border: 1px solid {{ $setting['primary'] }};
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
                font-size: 10px !important;
            }

            .tb-border td,
            .tb-border th {
                border: 1px solid #ddd;
            }

            .border-b {
                border-bottom: 1px solid #000 !important;
            }

            .bg-carmin {
                background-color: {{ $setting['primary'] }};
                color: white;
                font-size: 15px;
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
            .textoFormato {
                font-family: 'Arial';
            }
            .negrita {
                font-weight: bold;
            }

            .bg-carmin-two {
                background-color: {{ $setting['primary'] }};
                color: white;
            }
        </style>
    </head>
    <body>
        <main>
            @php
            $calculoEfectivo = number_format($data->total_perceptions - $data->total_deductions,2, '.', ',');
            $totalEfectivo   = $data->total_pantry_vouchers > 0 ?  number_format($calculoEfectivo - $data->total_pantry_vouchers,2, '.', ',') : $calculoEfectivo
            @endphp 
            @include('pdf_prototype_one')
        </main>
    </body>
</html>