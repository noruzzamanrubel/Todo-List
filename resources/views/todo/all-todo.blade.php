@extends('todo/master')

@section('content')
    <section class="todo text-center mt-5 border">
        <div class="todo-header d-flex align-item-center justify-content-center my-4">
            <h3>Your Todo List</h3>
            <a class="btn btn-info ml-3" href="{{ route('create') }}"><i class="far fa-plus-square"></i></a>
        </div>
        <ul class="list-unstyled">

            @if ($todo->count() > 0)
                @foreach ($todo as $row)
                    <li class="mt-2">
                        <div class="todo-left">

                            @include('todo.complete-button')

                            @if ($row->completed)
                                <p class="todo-list"><del>{{ $row->title }}</del></p>
                            @else
                                <p class="todo-list">{{ $row->title }}</p>
                            @endif

                        </div>

                        <div class="todo-right">

                            <div class="edit">
                                <a class="btn btn-sm btn-info mr-2" href="{{ URL::to('edit/' . $row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                            </div>

                            <div class="delete">

                                <span class="btn btn-sm btn-danger mr-2" onclick="event.preventDefault();
                            if(confirm('Are You Really want to delete?')){
                                document.getElementById('form-delete-{{ $row->id }}').submit()
                            }
                            ">
                                    <i class="fas fa-trash"></i>
                                </span>

                                <form style="display: none" id="{{ 'form-delete-' . $row->id }}"
                                    action="{{ route('todo.delete', $row->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>

                            </div>

                        </div>
                    </li>
                @endforeach
            @else
                <h5 class="m-3">No task available, Create One.</h5>
            @endif


        </ul>

    </section>
@endsection
