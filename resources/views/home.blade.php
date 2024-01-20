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
                                <h3 class="card-title">Bem-vindo, <b>{{strtoupper($user->name)}}</b></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="media/images/mascote.jpg"  width="270" height="470" >
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
                            @foreach($warnings as $warning)
                            <div class="callout callout-success">
                                <h4>
                                  <i class="fas fa-info"></i>
                                  <b>{{$warning->title}}:</b>
                                </h4>
                                <h6 class="card-subtitle mb-2 text-muted">Por: {{$warning->user_name}}</h6>
                                <div class="card-text">
                                    <h5>{{$warning->body}}<h5>
                                </div>
                            </div>
                            @endforeach
                            {{$warnings->links('pagination::bootstrap-4')}}
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