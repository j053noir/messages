@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="/pqr">Pqr</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Responder </li>
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(!$existe)
              <h3> No se puede responder esta PQR </h3>
            @else
              @if($pqr->estado == 1)
                <div class="alert alert-success" role="alert">
                  success! {{$pqr->solution}}
                </div>
              @endif
              <div class="card mb-3">
                  <div class="card-header">                   
                    <div class="text-right"> <span class="badge badge-success" style="float: left !important;">{{$pqr->id}} </span> {{$pqr->created_at}} </div>
                  </div>
                  <div class="card-body">                  
                    <p> {{$pqr->description}} </p>
                    <p> {{$pqr->updated_at}} </p>
                    <form action="/pqr/update/{{$pqr->id}}" method="POST">
                    {{ csrf_field() }}
                      <input type="hidden" class="form-control" name="id" id="id" value="{{$pqr->id}}" readonly/>
                      <input type="text" class="form-control" name="solution" id="solution"/>
                      <button type="submit" class="btn btn-default mt-2"> Guardar </button>
                    </form>
                  </div>
              </div>
            @endif

        </div>
    </div>
</div>
@endsection
