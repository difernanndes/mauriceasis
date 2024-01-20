@extends('adminlte::page')

@section('title', 'Novo Aviso')

@section('content_header')
    <h1>Novo Aviso</h1>
@endsection

@section('content')

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            <h5><i class="icon fas fa-ban"></i>Atenção</h5>

            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('warnings.store')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Título</label>
                    <div class="col-sm-12">
                        <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="body" class="col-sm-4 col-form-label">Texto</label>
                    <div class="col-sm-12">
                        <textarea rows="3" id="body" name="body" class="form-control  @error('body') is-invalid @enderror">{{old('body')}}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-secondary" onclick="history.go(-1);">Voltar</button>
                    <button type="submit" value="Cadastrar" class="btn btn-success float-right">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection