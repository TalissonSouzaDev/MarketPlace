@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('alert.index')
            <div class="card">
                <div class="card-header">Cria Categoria</div>

                <div class="card-body">
                    <form action="{{route('categorie.store')}}" method="post" autocomplete="off">
                        @csrf
                        @include('admin.pages.categorie.form') </br>

                      
                            <button type="submit" class="btn btn-success">Criar Categoria <i class="fas fa-save"></i></button>
                      

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection