<!-- Modal Incluir -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-primary" id="exampleModalLabel">Novo Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('users.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-4 col-form-label">Nome</label>
                        <div class="col-sm-12">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-form-label">E-mail</label>
                        <div class="col-sm-12">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-form-label">Matrícula</label>
                        <div class="col-sm-12">
                            <input type="number" name="registration" value="{{old('registration')}}" class="form-control @error('registration') is-invalid @enderror"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-form-label">Senha</label>
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 col-form-label">Confirmação da Senha</label>
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
                            <input type="checkbox" name="driver" id="driver" class="form-check-input @error('driver') is-invalid @enderror"/>
                            <label class="form-check" for="driver" >Motorista</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <label class="col-sm-4 col-form-label"></label>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" value="Cadastrar" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>