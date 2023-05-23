<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrato Diario</title>
    <style>
        @page{
            margin: 1.3rem;
            margin-top: 1.9rem;
            padding: 1rem;
        }
        body{
            margin:0px;
        }
        * {
            font-family: verdana, arial, sans-serif;
        }
        .cabecera {
            background-color: #FEFEFE;
            color: #000000;
            padding: 2rem;
            padding-top: .2rem;
            padding-bottom: 0px;
        }
        .cabecera .logo {
            margin: 5px;
        }

        .cabecera table{
            padding: 1px;
            margin-bottom: .2rem;
        }
        table{
            font-size: x-small;
            border-collapse: collapse;
        }
        th, td{
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .rowDescription{
            background-color:lightgray;
        }
    </style>
</head>
<body>
    <div class="cabecera">
        <table width="100%" cellspacing="0" cellspacing="1" border="1" align="center">
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellspacing="1" align="center">
                        <tr>
                            <td>
                                <img src="#" alt="Texto alternativo al no cargar la imagen" class="logo" width="210" height="90">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Contrato General de Renta
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table width="100%" cellspacing="0" cellspacing="1" align="center">
                        <tr>
                            <td>#Contrato:</td>
                            <td>{{ $reporte[0]->id }}</td>
                        </tr>
                        <tr>
                            <td>Fecha:</td>
                            <td>{{ now()->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td>Nombre Conductor:</td>
                            <td>{{ $reporte[0]->nombreCliente }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" cellspacing="0" cellspacing="0" align="center">
            <tr>
                <td colspan="2">
                    <h3><strong>Información</strong></h3>
                </td>
            </tr>
            <tr>
                <td>Fecha Inicio Contrato:</td>
                <td>{{ $reporte[0]->fechaInicioContrato }}</td>
            </tr>
            <tr>
                <td>Fecha Fin Contrato:</td>
                <td>{{ $reporte[0]->fechaFinContrato }}</td>
            </tr>
            <tr>
                <td>Unidad:</td>
                <td>{{ $reporte[0]->unidad }}</td>
            </tr>
        </table>
        <table width="100%" cellspacing="0" cellspacing="1" border="1" align="center">
            <thead class="rowDescription">
                <tr align="center" align="middle">
                    <th colspan="8"> Detalle del Contrato</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <th colspan="2" align="center" class="rowDescription">Importe Renta:</th>
                    <th colspan="2">$<span>{{ number_format($reporte[0]->importeRenta,2) }}</span></th>
                    <th colspan="2" align="center" class="rowDescription">Importe Depósito:</th>
                    <th colspan="2">$<span>{{ number_format($reporte[0]->importeDeposito,2) }}</span></th>
                </tr>
                <tr>
                    <th colspan="4" align="center" class="rowDescription">Descripción Equipo:</th>
                    <th colspan="4"><span>{{ $reporte[0]->descripcionEquipo }}</span></th>
                </tr>
                <tr>
                    <th colspan="4" align="center" class="rowDescription">Nombre Testigo:</th>
                    <th colspan="4"><span>{{ $reporte[0]->nombreTestigo }}</span></th>
                </tr>
            </tbody>
        </table>
        <table>

        </table>
    </div>
</body>
</html>
