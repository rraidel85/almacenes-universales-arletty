<!DOCTYPE HTML>
<html>

<head>
    <meta name="google" value="notranslate" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>PDF</title>
    <link href="{{ ('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Listado de ventas</h1>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped" id="ventas-table">
                    <thead>
                        <tr>
                            <th>Recaudado</th>
                            <th>Descripcion</th>


                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                            <tr>
                                <td>{{ $venta->recaudado }}</td>
                                <td>{{ $venta->descripción }}</td>
                               

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>
