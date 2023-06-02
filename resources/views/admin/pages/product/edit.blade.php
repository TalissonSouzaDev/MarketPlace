@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar Produto: {{$product->name}}</div>

                <div class="card-body">
                    <form action="{{route('product.update',[$product->id])}}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.pages.product.form') </br>

                      
                            <div class="form inline">
                                <a href="{{route('product.index')}}" class="btn btn-info"> <i class="fas fa-long-arrow-left"></i> Volta</a>
                                <button type="submit" class="btn btn-success">Salva Dados <i class="fas fa-save"></i></button>
                            </div>
                      

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection