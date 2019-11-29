@extends('layout.masteradmin')

@section('content')
    <h3>welcome user</h3>

       @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="well">
                    <h3><a href="/post/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>Written on {{$post->created_at}}</small>
                </div>
            @endforeach
        @else
            <p>Comming Soon</p>

        @endif

   



    {{-- <div class="panel-body">
                <a href="/post/create">Create Post</a>
                <h3>Your Posts</h3>
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <th>{{$user->name}}</th>
                            <th><a href="/posts/{{$post->id}}/edit" class="btn btn-default">EDIT</a></th>
                            <th></th>
                        </tr>
                    @endforeach
        
        
                </table>
            </div> --}}

@stop
