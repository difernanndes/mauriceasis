@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>Novo Usuário</h1>
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
            <form action="{{route('users.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Nome *</label>
                    <div class="col-sm-12">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">E-mail *</label>
                    <div class="col-sm-12">
                        <input type="email" name="email" value="{{old('email')}}" class="form-control  @error('email') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Matrícula *</label>
                    <div class="col-sm-12">
                        <input type="number" name="registration" value="{{old('registration')}}" class="form-control @error('registration') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Senha *</label>
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 col-form-label">Confirmação da Senha *</label>
                    <div class="col-sm-12">
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Imagem</label>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="custon-file">
                                <input id="1" type="file" name="image" value="{{old('image')}}" class="custom-file-input @error('image') is-invalid @enderror"/>
                                <label class="custom-file-label" for="1" >Escolher arquivo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <label class="col-sm-4 col-form-label">Permissões</label>
                <div class="form-check">
                    <div class="form-check">
                        <input type="checkbox" name="admin" id="admin" class="form-check-input @error('admin') is-invalid @enderror"/>
                        <label class="form-check" for="admin" >Administrador</label>
                    </div>
                </div>
                <div class="form-check">
                    <div class="form-check">
                        <input type="checkbox" name="logistics" id="logistics" class="form-check-input @error('logistics') is-invalid @enderror"/>
                        <label class="form-check" for="logistics" >Logística</label>
                    </div>
                </div>
                <div class="form-check">
                    <div class="form-check">
                        <input type="checkbox" name="concierge" id="concierge" class="form-check-input @error('concierge') is-invalid @enderror"/>
                        <label class="form-check" for="concierge" >Portaria</label>
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