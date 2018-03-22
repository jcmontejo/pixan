@extends('layouts.app') @section('title') Crear Nuevo Producto @stop @push('stylesheets')
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
<style>
    body {
        background-color: #F2F2F2;
    }

    .card-title {
        font-size: 35pt;
        color: #EC2227;
        text-align: center;
    }

    .card-text {
        font-size: 16pt;
        color: #616161;
        text-align: center;
    }

    .button-add {
        background-color: #EC2227;
        border: none;
        color: #ffffff;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
    }

    .button1 {
        border-radius: 25px;
    }
</style>
@endpush @section('content')
<div class="container-fluid py-5">
    {!! Form::open(['url' => 'admin/product', 'class' => 'form-horizontal', 'files' => 'true'])
    !!}
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registra un producto para vender</h5>
                    <p class="card-text">Escribe la información de tu producto, una fotografía y la fecha y hora en que dejas de recibir pedidos
                        para el producto.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-5">

        <div class="col-12 col-sm-8 col-md-6 col-lg-8 mx-auto">
            <div class="card">
                <div class="form-group text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <img src="{{asset('images/icons/circle-icon@2x.png')}}" style="width:60px;" alt="">
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Información general de tu producto</h5>
                    <p class="card-text">

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    {!! Form::label('name', 'El nombre de tu producto: ', ['class' => 'control-label']) !!}
                                    <div>
                                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'ej. Monitor LG de 23'])
                                        !!} {!! $errors->first('name', '
                                        <p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                                    {!! Form::label('category', 'Categoría de tu producto: ', ['class' => 'control-label']) !!}
                                    <div>
                                        {!! Form::text('category', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'ej. Electrónicos'])
                                        !!} {!! $errors->first('category', '
                                        <p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                    {!! Form::label('description', 'Descripción del producto: ', ['class' => 'control-label']) !!}
                                    <div>
                                        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'ej. Monitor
                                        Full HD LG, 23 pulgadas, Resolución 1920x1080 px']) !!} {!! $errors->first('description',
                                        '
                                        <p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
                                    {!! Form::label('stock', '¿Cuántos productos quieres vender?: ', ['class' => 'control-label']) !!}
                                    <div>
                                        {!! Form::number('stock', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'ej. 1']) !!} {!!
                                        $errors->first('stock', '
                                        <p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group {{ $errors->has('deadline') ? 'has-error' : ''}}">
                                    {!! Form::label('deadline', '¿Hasta cuando estará disponible?: ', ['class' => 'control-label']) !!}
                                    <div>
                                        {!! Form::input('datetime-local', 'deadline', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' =>
                                        'Selecciona una fecha y hora']) !!} {!! $errors->first('deadline', '
                                        <p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                                    {!! Form::label('price', '¿Que precio tiene tu producto?: ', ['class' => 'control-label']) !!}
                                    <div>
                                        {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'ej. 3000 (Usa sólo
                                        números)']) !!} {!! $errors->first('price', '
                                        <p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-8 mx-auto">
            <div class="card">
                <div class="form-group text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <img src="{{asset('images/icons/circle-camera@2x.png')}}" style="width:60px;" alt="">
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fotografía de tu producto</h5>
                    <p class="card-text">
                        Presiona aquí para subir una fotografía de tu producto.
                    </p>
                    <div class="form-row">
                        <div class="col">
                            <input required type="file" class="form-control" name="photo" placeholder="Seleccionar imagen">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="float-right">
            <div>
                {!! Form::submit('PUBLICAR', ['class' => 'btn button-add button1 form-control', 'id' => 'submit-all']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif @section('scripts')
<script src="{{asset('js/dropzone.js')}}"></script>
<script>
    Dropzone.options.mydropzone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,

        // The setting up of the dropzone
        init: function () {
            var myDropzone = this;

            // First change the button to actually tell Dropzone to process the queue.
            this.element.querySelector("button[type=submit]").addEventListener("click", function (e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function () {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });
            this.on("successmultiple", function (files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
            });
            this.on("errormultiple", function (files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }

    }
</script>
@endsection @endsection