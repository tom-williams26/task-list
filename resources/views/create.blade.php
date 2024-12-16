@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input text="text" name="title" id="title" type="text">
        </div>
        <div>
            <label for="Description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>
        <div>
            <label for="long-Description">Long Description</label>
            <textarea name="long-Description" id="long-Description" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>

@endsection
