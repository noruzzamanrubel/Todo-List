@if ($row->completed)
    <span onclick="event.preventDefault();document.getElementById('form-incomplete-{{ $row->id }}').submit()"
        style="color:green"><i class="fas fa-check"></i></span>

    <form style="display: none" id="{{ 'form-incomplete-' . $row->id }}"
        action="{{ route('todo.incomplete', $row->id) }}" method="post">
        @csrf
        @method('post')
    </form>

@else
    <span onclick="event.preventDefault();document.getElementById('form-complete-{{ $row->id }}').submit()"
        style="color: grey"><i class="fas fa-check cursor-pointer"></i></span>

    <form style="display: none" id="{{ 'form-complete-' . $row->id }}"
        action="{{ route('todo.complete', $row->id) }}" method="post">
        @csrf
        @method('put')
    </form>

@endif
