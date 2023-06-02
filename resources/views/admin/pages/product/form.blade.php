<div class="form-group">
    <label for="name">Nome do Produto</label>
    <input type="text" class="form-control" name="name" placeholder="Digite o nome do produto" value="{{$product->name ?? old("name")}}">
</div>
<div class="form-group">
    <label for="name">Preço </label>
    <input type="text" class="form-control" name="price" placeholder="Preço do produto" value="{{$product->price ?? old("price")}}">
</div>

<div class="form-group">
    <label for="name">Conteúdo </label>
    <input type="text" class="form-control" name="body" placeholder="corpo do produto" value="{{$product->body ?? old("body")}}">
</div>

<div class="form-group">
    <label for="name">Imagem do produto </label>
    <input type="file" class="form-control" name="image[]" multiple>
</div>

<div class="form-group">
    <label for="name">Descrição:</label>
    <textarea type="text"  rows="10" class="form-control" name="description">{{$product->description ?? old("description")}}</textarea>
</div>