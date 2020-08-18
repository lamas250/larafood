@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Identificação da Mesa</label>
    <input type="text" name="identify" class="form-control" placeholder="Nome" value="{{$table->identify ?? old('identify')}}">
</div>
<div class="form-group">
    <label>Descrição</label>
   <textarea name="description" ols="30" rows="5" class="form-control">{{$table->description ?? old('description')}}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>