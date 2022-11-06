@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Editar Oferta</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($oferta, ['route' => ['ofertas.update', $oferta->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('ofertas.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('ofertas.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection


@push('third_party_scripts')
    <script>
        let stocks_seleccionados = @json($stocks_seleccionados);
        $('#stockSelect').val(stocks_seleccionados); 
        $('#stockSelect').trigger('change');
    </script>
@endpush