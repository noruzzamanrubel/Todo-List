@extends('todo/master')

@section('content')
    <section class="todo text-center mt-5 border">
        <div class="todo-header d-flex align-item-center justify-content-center mt-4">
            <h3>ToDo Lists Create</h3>
            <a class="btn btn-info ml-3" href="{{ route('create') }}"><i class="far fa-plus-square"></i></a>
        </div>
        <ul class="list-unstyled">
            @foreach ($todo as $row)
                <li class="mt-2">
                    @if ($row->completed)
                        <p><del>{{ $row->title }}</del></p>
                    @else
                        <p>{{ $row->title }}</p>
                    @endif
                    <div class="edit">
                        <a class="btn btn-sm btn-info mr-2" href="{{ URL::to('edit/' . $row->id) }}"><i
                                class="fas fa-edit"></i></a>
                        @if ($row->completed)
                            <span
                                onclick="event.preventDefault();document.getElementById('form-incomplete-{{ $row->id }}').submit()"
                                style="color:green"><i class="fas fa-check"></i></span>

                            <form style="display: none" id="{{ 'form-incomplete-' . $row->id }}"
                                action="{{ route('todo.incomplete', $row->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>

                        @else
                            <span
                                onclick="event.preventDefault();document.getElementById('form-complete-{{ $row->id }}').submit()"
                                style="color: grey"><i class="fas fa-check cursor-pointer"></i></span>

                            <form style="display: none" id="{{ 'form-complete-' . $row->id }}"
                                action="{{ route('todo.complete', $row->id) }}" method="post">
                                @csrf
                                @method('put')
                            </form>

                        @endif
                    </div>
                </li>
            @endforeach
        </ul>

    </section>
@endsection
