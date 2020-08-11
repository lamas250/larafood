@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$plan->name ?? old('name')}}">
</div>
<div class="form-group">
    <label>Preço</label>
    <input type="text" name="price" placeholder="Preço" class="form-control" value="{{$plan->price ?? old('price')}}">
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{$plan->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>