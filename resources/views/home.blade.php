@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1></h1>
@endsection

@section('content')
    <div class="content">
        <div class="content-fluid">
            <div class="row align-items-between">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-center">
                                <h3 class="card-title">Bem-vindo ao Mauricéa Sis!</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="media/images/mascote.jpg"  width="250" height="415" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-center">
                                <h3 class="card-title">Mural de Avisos</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-success">
                                <h4>
                                  <i class="fas fa-info"></i>
                                  Título do Aviso:  
                                </h4>
                                <h6 class="card-subtitle mb-2 text-muted">Por: Diego Fernandes</h6>
                                <div class="card-text">
                                    <h5>Aviso de teste... asdasdasdsadasd asdasd a<h5>
                                </div>
                            </div>
                            <div class="callout callout-info">
                                <h4>
                                  <i class="fas fa-info"></i>
                                  Título do Aviso:  
                                </h4>
                                <h6 class="card-subtitle mb-2 text-muted">Por: Fulano de Tal</h6>
                                <div class="card-text">
                                    <h5>Aviso de teste 2...a<h5>
                                </div>
                            </div>
                            <div class="callout callout-danger">
                                <h4>
                                  <i class="fas fa-info"></i>
                                  Título do Aviso:  
                                </h4>
                                <h6 class="card-subtitle mb-2 text-muted">Por: Diego Fernandes</h6>
                                <div class="card-text">
                                    <h5>Aviso de teste 3.<h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection