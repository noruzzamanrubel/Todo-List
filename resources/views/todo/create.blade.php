@extends('todo/master')

@section('content')
    <section class="todo text-center border mt-5 p-5">
        <div class="todo-list-title m-3">
            <h1>ToDo Lists Create</h1>
            <a class="ml-3" href="{{ route('all') }}"><i class="fas fa-arrow-left"></i></a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('store') }}" class="justify-content-center m-4">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control mb-2 mr-sm-2" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Description" name="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-info mb-2">Create</button>
        </form>
    </section>
@endsection
