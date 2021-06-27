@extends('todo/master')

@section('content')
    <section class="todo text-center border mt-5 p-5">
        <div class="todo-list-title m-3">
            <h1>{{$todo->title}}</h1>
            <a class="ml-3" href="{{ route('all') }}"><i class="fas fa-arrow-left"></i></a>
        </div>

        <div class="todo-description">
            <p>{{$todo->description}}</p>
        </div>


    </section>
@endsection
