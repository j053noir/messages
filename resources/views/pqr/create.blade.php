@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="/pqr">Pqr</a></li>
    <li class="breadcrumb-item active" aria-current="page"> Crear PQR </li>
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
              @if($save)
                <div class="alert alert-success" role="alert">
                  success! {{$obj->description}}
                </div>                
              @endif
              <div class="card mb-3">
                  <div class="card-header">                   
                    <h3> Creando PQR </h3>
                  </div>
                  <div class="card-body">           
                    
                    <form action="/pqr/create" method="POST">
                      {{ csrf_field() }}
                      <label> Descripción </label>
                      <input type="text" class="form-control" name="description" id="description"/>
                      <button type="submit" class="btn btn-default mt-2"> Guardar </button>
                    </form>
                  </div>
              </div>

        </div>
    </div>
</div>
@endsection
