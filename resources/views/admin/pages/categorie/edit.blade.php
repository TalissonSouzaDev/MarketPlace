@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('alert.index')
            <div class="card">
                <div class="card-header">Atualizar Categoria: {{$categorie->name}}</div>

                <div class="card-body">
                    <form action="{{route('categorie.update',[$categorie->id])}}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        @include('admin.pages.categorie.form') </br>

                      
                            <div class="form inline">
                                <a href="{{route('categorie.index')}}" class="btn btn-info"> <i class="fas fa-long-arrow-left"></i> Volta</a>
                                <button type="submit" class="btn btn-success">Salva Dados <i class="fas fa-save"></i></button>
                            </div>
                      

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection