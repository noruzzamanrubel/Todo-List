@extends('todo/master')

@section('content')
    <section class="todo text-center border p-5 mt-5">
        <h1>ToDo Lists Edit</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('update', $todo->id) }}" class="form-inline justify-content-center">
            @csrf
            <input type="text" class="form-control mb-2 mr-sm-2" name="title" value="{{ $todo->title }}">
            <button type="submit" class="btn btn-info mb-2">update</button>
        </form>
        <a class="btn btn-info m-5" href="{{ route('all') }}">Back</a>
    </section>
@endsection

