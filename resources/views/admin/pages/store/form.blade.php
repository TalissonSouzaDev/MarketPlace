<div class="form-group">
    <label for="name">Nome da Empresa</label>
    <input type="text" class="form-control" name="name" placeholder="Digite o nome da empresa" value="{{$store->name ?? old("name")}}">
</div>
<div class="form-group">
    <label for="name">Telefone </label>
    <input type="text" class="form-control" name="phone" placeholder="Telefone Empresarial" value="{{$store->phone ?? old("phone")}}">
</div>

<div class="form-group">
    <label for="name">celular / Whatsapp <i class="fab fa-whatsapp"></i></label>
    <input type="text" class="form-control" name="mobile_phone" placeholder="Telefone celular com whats" value="{{$store->mobile_phone ?? old("mobile_phone")}}">
</div>

<div class="form-group">
    <label for="name">Sobre a Empresa:</label>
    <textarea type="text"  rows="10" class="form-control" name="description">{{$store->description ?? old("description")}}</textarea>
</div>