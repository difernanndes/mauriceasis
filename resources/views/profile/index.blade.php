@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content_header')
    <h1>Meu Perfil</h1>
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

    @if(session('warning'))
        <div class="alert alert-success">
            {{session('warning')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('profile.save')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Imagem</label>
                    <div class="col-sm-12">
                        @if(file_exists($hasImage))
                        <img class="user-image elevation-2 rounded-left" src="/media/images/profile/{{strtolower(str_replace(" ", "", $user['registration']))}}.jpg" alt="Usuário" width=180 height=auto><br/><br/>
                        @else
                        <img class="user-image elevation-2 rounded-left" src="/media/images/profile/profile.jpg" alt="Usuário" width=180 height=180><br/><br/>
                        @endif
                        <div class="input-group">
                            <div class="custon-file">
                                <input id="1" type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror"/>
                                <label class="custom-file-label" for="1" >Escolher arquivo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-12">
                        <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-12">
                        <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Nova Senha</label>
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Confirmação da Senha</label>
                    <div class="col-sm-12">
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-12">
                        <input type="submit" value="Salvar" class="btn btn-success"/>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection