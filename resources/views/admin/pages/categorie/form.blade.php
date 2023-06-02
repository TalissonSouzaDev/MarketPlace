<div class="form-group">
    <label for="name">Categoria</label>
    <input type="text" class="form-control  @error('name') is-invalid  @enderror" name="name" placeholder="Digite o nome da Categoria" value="{{$categorie->name ?? old("name")}}">

    @error('name')
    <div class="invalid-feedback">
           {{$message}}
    </div>
   @enderror
</div>
