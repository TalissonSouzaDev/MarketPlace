@extends('layouts.app')

@section('content')
<a href="{{route('notifcations.ReadAll')}}" class="btn btn-success">Marca como lidas!</a>


<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Notificação</th>
            <th>Tempo de recibemento</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($unreadNotifications as $n)
        <tr>
            <td>{{$n->data['message']}}</td>
            <td>{{$n->create_at->locale('pt')->diffForHumans()}}</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Marcar como lida</a>
                </div>
            </td>
         
        </tr>
        @endforeach
      
    </tbody>
</table>

@endsection