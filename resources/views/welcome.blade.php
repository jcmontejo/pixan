@extends('layouts.login')
@push('stylesheets')
<style>
    body {
        background-color: #EC2227;
        }
    .login{
        margin-top: 100px;
    }
    .button-login {
    background-color: #EC2227;
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    }
    .button-register {
    background-color: #ffffff;
    border: none;
    color: #EC2227;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    }
    .button1 {border-radius: 25px;}
    .login-title{
        font-size: 25pt;
        color: #EC2227;
    }
    .login-label{
        font-size: 20pt;
        color: #616161;
    }
    .login-placeholder{
        font-size: 18pt;
        color:  #818386;
    }
    .brand{
        margin-top: 200px;
    }
    .brand-title{
        font-family: 'Montserrat';
        font-size: 35pt;
        color: #ffffff;
    }
    .brand-p{
        font-family: 'Montserrat';
        font-size: 16pt;
        color: #ffffff;
    }
</style>
@endpush
@section('content')
    <div class="container">
        <div class="row mt-5">
           <div class="col-md-6 brand">
            <div class="text-center">
                <img src="{{asset('images/brand/pixan@2x.png')}}" class="img-fluid img-brand" alt="Responsive image">
           <br><br>
           <h2 class="brand-title">¡Lo que tu quieras!</h2>
           <p class="brand-p">
               La plataforma líder en compra y venta
               de productos en línea en México.
           </p>
            <a href="{{ route('register') }}" class="btn button-register button1 btn-lg">REGÍSTRATE</a>
            </div>
           </div>
            <div class="col-md-6 login">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center login-title">Inicia Sesión</h4>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label login-label">Correo Electrónico</label>

                                <div class="col-md-12">
                                    <input type="email" class="form-control login-placeholder" name="email" placeholder="ej. maria@lacasademaria.mx"
                                           value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="form-text text-muted">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label login-label">Contraseña</label>

                                <div class="col-md-12">
                                    <input type="password" class="form-control login-placeholder" name="password" placeholder="Escribe tu contraseña">

                                    @if ($errors->has('password'))
                                        <span class="form-text text-muted">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn button-login button1 btn-lg">
                                        <i class="fa fa-btn fa-sign-in"></i>INICIAR SESIÓN
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
