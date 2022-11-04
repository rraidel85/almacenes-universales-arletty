@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Verifique su dirección de correo electrónico</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico
                            </div>
                        @endif
                        <p>
                            Antes de continuar, verifique su correo electrónico para obtener un enlace de verificacion sino recibiste el correo
                        </p>
                        <a href="{{ route('verification.resend') }}"> Haga clic aquí para solicitar otro</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
