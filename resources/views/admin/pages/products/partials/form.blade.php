@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$product->name ?? old('name')}}">
</div>
<div class="form-group">
    <label>Preço</label>
    <input type="text" name="price" class="form-control" placeholder="Preço" value="{{$product->price ?? old('price')}}">
</div>
<div class="form-group">
    <label>Imagem</label>
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group">
    <label>Descrição</label>
   <textarea name="description" ols="30" rows="5" class="form-control">{{$product->description ?? old('description')}}</textarea>
</div>


<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>