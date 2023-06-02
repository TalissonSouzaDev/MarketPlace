@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cria Produto</div>

                <div class="card-body">
                    <form action="{{route('product.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @include('admin.pages.product.form') </br>

                      
                            <button type="submit" class="btn btn-success">Criar Produto <i class="fas fa-save"></i></button>
                      

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection