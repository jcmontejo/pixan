@extends('layouts.app') @section('title') Productos @stop @push('stylesheets')
<style>
    body {
        background-color: #F2F2F2;
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

    .title {
        font-size: 28pt;
        color: #616161;
    }

    .name {
        font-size: 18pt;
        color: #616161;
    }

    .description {
        font-size: 16pt;
        color: #616161;
    }

    .price {
        font-size: 28pt;
        color: #010101;
    }
</style>
@endpush @section('content')
<div class="container-fluid py-5">
    @if(session()->has('message'))
    <div>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h3>
                <strong>Mensaje del sistema:</strong> {{ session()->get('message') }}</h3>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h1 class="title">Mis Productos</h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2">
            <a href="{{ url('admin/product/create') }}" class="btn button-add button1 pull-right btn-sm">AGREGAR</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach($product as $item)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('uploads')}}/{{$item->filename}}" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title name">{{$item->name}}</h4>
                    <br>
                    <p class="card-text description">{{$item->description}}</p>
                    <div class="float-left">
                        <p class="card-text price float-right">
                            ${{number_format($item->price)}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection