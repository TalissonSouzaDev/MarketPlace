@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('alert.index')
            <div class="card">
                <div class="card-header">Categorias  
                    <a href="{{route('categorie.create')}}" class="btn btn-success">Criar Categoria <i class="far fa-plus"></i></a>
                </div>

                <div class="card-body">
                   @if (!empty($categorie))

                <table class=" table table-condensed">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categorie as $categories)
                        <tr>
                     
                        <td>{{$categories->name}}</td>
                        <td>
                            <div class="d-flex" style="display:flex">
                                <a href="{{route("categorie.edit",$categories->id)}}" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                            
                            <form action="{{route('categorie.destroy',$categories->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button style="margin-left:15px" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            </div>
                            
                        </td>
                        @endforeach
                        </tr>
                    </tbody>


                </table>


                    @else

                <h4> <i>Humm... , Ainda não existir categoria cadastrada</i></h4>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection