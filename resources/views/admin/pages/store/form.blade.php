<div class="form-group">
    <label for="name">Nome da Empresa</label>
    <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" placeholder="Digite o nome da empresa" value="{{$store->name ?? old("name")}}">
    
    @error('name')
    <div class="invalid-feedback">
           {{$message}}
    </div>
   @enderror
</div>
<div class="form-group">
    <label for="name">Telefone </label>
    <input type="text" class="form-control @error('phone') is-invalid  @enderror" name="phone" placeholder="Telefone Empresarial" value="{{$store->phone ?? old("phone")}}">
    
    @error('phone')
    <div class="invalid-feedback">
           {{$message}}
    </div>
   @enderror
</div>

<div class="form-group">
    <label for="name">celular / Whatsapp <i class="fab fa-whatsapp"></i></label>
    <input type="text" class="form-control @error('mobile_phone') is-invalid  @enderror" name="mobile_phone" placeholder="Telefone celular com whats" value="{{$store->mobile_phone ?? old("mobile_phone")}}">
    
    @error('mobile_phone')
    <div class="invalid-feedback">
           {{$message}}
    </div>
   @enderror
</div>

<div class="form-group">
    <label for="name">Sobre a Empresa:</label>
    <textarea type="text"  rows="10" class="form-control @error('description') is-invalid  @enderror" name="description">{{$store->description ?? old("description")}}</textarea>
    
    @error('name')
    <div class="invalid-feedback">
           {{$message}}
    </div>
   @enderror
</div>
