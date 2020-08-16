@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$user->name ?? old('name')}}">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" placeholder="Email" class="form-control" value="{{$user->email ?? old('email')}}">
</div>
<div class="form-group">
    <label>Senha</label>
    <input type="text" name="password" placeholder="Senha" class="form-control" >
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>