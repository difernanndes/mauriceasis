@extends('adminlte::page')

@section('title', 'Avisos')

@section('content_header')
    <h1>Avisos</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <div class="card-header">
                <a href="{{route('warnings.create')}}" class="btn btn-sm btn-success">Novo Aviso</a>
                <div class="card-tools">
                    <div class="card-tools" style="margin-top: 5px">
                        <div class="input-group input-group-sm" style="width: 200px;">
                                <form action="/warnings" method="GET">
                                    <input type="text" name="warning_search" value="{{$search}}" class="form-control float-right" placeholder="Buscar">
                                        <div class="input-group-append">
                                            <button type="submit"  class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                </form>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Texto</th>
                                    <th>Usuário</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($warnings as $warning)
                                <tr>
                                    <td>{{$warning->id}}</td>
                                    <td>{{$warning->title}}</td>
                                    <td>{{mb_strimwidth($warning->body, 0, 60, "...");}}</td>
                                    <td>{{$warning->user_name}}</td>
                                    <td>
                                        @if($warning->user_name === $loggedName)
                                        <a href="{{route('warnings.edit', ['warning' => $warning->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                        <form class="d-inline" method="POST" action="{{route('warnings.destroy', ['warning' => $warning->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                            @method('DELETE')
                                            @csrf
                                            <button  class="btn btn-sm btn-danger">Excluir</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </div>
</div>

{{$warnings->links('pagination::bootstrap-4')}}

@endsection

@section('footer')
    @include('footer')
@endsection