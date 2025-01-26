@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task</a>
    </nav>
    {{-- Provides a list of tasks --}}
    @forelse ($tasks as $task)
        <div>
            {{-- Each task becomes a link and directs the user to the singular task. Appends the id of the task in the URL. --}}
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
        <div>
            There are no tasks!
        </div>
    @endforelse

    @if ($task->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
