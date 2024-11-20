@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    {{-- @if (count($tasks)) --}}
    {{-- Provides a list of tasks --}}
    @forelse ($tasks as $task)
        <div>
            {{-- Each task becomes a link and directs the user to the singular task. Appends the id of the task in the URL. --}}
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>
            There are no tasks!
        </div>
    @endif
@endsection
