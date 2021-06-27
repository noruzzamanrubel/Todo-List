@extends('todo/master')

@section('content')
    <section class="todo text-center border mt-5">
        <h1 class="my-3">ToDo Lists Create</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('store') }}" class="form-inline justify-content-center">
            @csrf
            <input type="text" class="form-control mb-2 mr-sm-2" name="title">
            <button type="submit" class="btn btn-info mb-2">Create</button>
        </form>
        <a class="btn btn-info m-3" href="{{route('all')}}">Back</a>
    </section>
@endsection
