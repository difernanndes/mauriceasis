@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <h1>Editar Usuário</h1><br/>
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
            <form action="{{route('users.update', ['user'=>$user->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Nome *</label>
                    <div class="col-sm-12">
                        <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">E-mail *</label>
                    <div class="col-sm-12">
                        <input type="email" name="email" value="{{$user->email}}" class="form-control  @error('email') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Matrícula *</label>
                    <div class="col-sm-12">
                        <input type="number" name="registration" value="{{$user->registration}}" class="form-control @error('registration') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Nova Senha</label>
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 col-form-label">Confirmação da Senha</label>
                    <div class="col-sm-12">
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-form-label">Imagem</label>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="custon-file">
                                <input id="image" type="file" name="image" value="{{old('image')}}" class="custom-file-input @error('image') is-invalid @enderror"/>
                                <label class="custom-file-label" for="image" >Escolher arquivo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <label class="col-sm-4 col-form-label">Permissões</label>
                <div class="form-check">
                    <div class="form-check">
                        @if($user->admin === 0)
                        <input type="checkbox" name="admin" id="admin" class="form-check-input @error('admin') is-invalid @enderror"/>
                        @else
                        <input type="checkbox" name="admin" checked="checked" id="admin" class="form-check-input @error('admin') is-invalid @enderror"/>
                        @endif
                        <label class="form-check" for="admin" >Administrador</label>
                    </div>
                </div>
                <div class="form-check">
                    <div class="form-check">
                        @if($user->logistics === 0)
                        <input type="checkbox" name="logistics" id="logistics" class="form-check-input @error('logistics') is-invalid @enderror"/>
                        @else
                        <input type="checkbox" name="logistics" checked="checked"  id="logistics" class="form-check-input @error('logistics') is-invalid @enderror"/>
                        @endif
                        <label class="form-check" for="logistics" >Logística</label>
                    </div>
                </div>
                <div class="form-check">
                    <div class="form-check">
                        @if($user->concierge === 0)
                        <input type="checkbox" name="concierge" id="concierge" class="form-check-input @error('concierge') is-invalid @enderror"/>
                        @else
                        <input type="checkbox" name="concierge" checked="checked" id="concierge" class="form-check-input @error('concierge') is-invalid @enderror"/>
                        @endif
                        <label class="form-check" for="concierge" >Portaria</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-secondary" onclick="history.go(-1);">Voltar</button>
                    <button type="submit" value="Cadastrar" class="btn btn-success float-right">Salvar</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection