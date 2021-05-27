<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reporte de actividades</title>
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
      width: 100%;
      font-family: 'Montserrat';
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
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
    .row {
        width: 100%;
        box-sizing: content-box;
        position:relative;
    }
    .row .column {
        display: block;
        float:left;
        width: 50%;
    }
    .subTitle {
        font-size: 10px;
        font-weight: bold;
    }
    .bg-gray {
        background: #fafafa;
    }
    footer {
        position: fixed; 
        bottom: 0; 
        left: 0px; 
        right: 0px;
        height: 50px; 
    }
    .text-h3 {
      font-size:12px;
      font-weight:bold;
    }
  </style>
</head>
<body>
  <div>
    <table>
        <tr>
            <td width="30%">
              <img src="data:image/png;base64,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" width="200px">
            </td>
            <td width="70%">
              <h2>{{$dependency->fiscalName}}</h2>
              <div class="text-h3">Formato de Reporte de Actividades de Servicios Profesionales</div>
              <div class="text-h3">{{$unit->name}}</div>
            </td>
        </tr>
    </table>
    <table class="subTitle">
        <tr>
            <td width="30%"></td>
            <td>Control de Actividades de: {{$employee->fullName}}</td>
        </tr>
        <tr>
            <td width="30%"></td>
            <td>Periodo: {{$period}},       {{$year}}.</td>
        </tr>
        <tr>
            <td width="30%"></td>
            <td>Área, Proyecto, Especialidad y Específico: {{$unit->number}}-{{$project->project_key}}-{{$project->speciality}}-{{$project->specific}}</td>
        </tr>
        <tr>
            <td width="30%"></td>
            <td>RFC: {{$employee->rfc}}</td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr class="tb-border text-center bg-gray">
            <th>Req</th>
            <th>Actividad</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>% Avance</th>
        </tr>
        <tbody>
          @foreach($activities as $key => $activity)
            <tr class="tb-border text-center">
                <td width="5%">{{$key+1}}</td>
                <td width="30%">{{$activity->name}}</td>
                <td width="30%">{{$activity->description}}</td>
                <td width="20%">{{$activity->status->name}}</td>
                <td width="10%">{{$activity->progress}}%</td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <br/><br/>
    <table>
        <tr class="text-center">
            <td>
              @if(isset($responsable->charge))
                {{$responsable->charge}}
              @endif
            </td>
            <td>
                Prestador de servicios profesionales
            </td>
        </tr>
        <tr class="text-center">
            <td>
              @if(isset($responsable->name))
                {{$responsable->name}}
              @endif
            </td>
            <td>
              {{$employee->fullName}}
            </td>
        </tr>
    </table>
  </div>
</body>
</html>