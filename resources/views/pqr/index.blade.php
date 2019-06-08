@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Pqr</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Listado </li>
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <a href="/pqr/create" class="btn btn-primary"> Crear </a>
        </div>
        <div class="col-md-8">
          @foreach($pqrs as $item)
            <div class="card mb-3">
                <div class="card-header">                   
                  <div class="text-right"> 
                    <span class="badge badge-light" style="float:left;"> RADICADO: </span>
                    <span class="badge badge-success" style="float: left !important;"> {{$item->id}} </span> 
                    {{$item->created_at}}
                  </div>
                </div>
                <div class="card-body">
                  <p> {{$item->description}} </p>
                  <p> {{$item->updated_at}} </p>
                  @if($item->estado == 0)
                    <button class="btn btn-default"> Pendiente </button>
                    <a href="/pqr/update/{{$item->id}}" class="btn btn-primary"> Responder </a>
                  @else
                    <strong>Respuesta:</strong> 
                    <div class="alert alert-success" role="alert">                      
                      {{$item->solution}}
                    </div>
                    <button class="btn btn-success"> Atendido </button>
                  @endif
                </div>
            </div>
          @endforeach
        </div>
    </div>
</div>
@endsection
