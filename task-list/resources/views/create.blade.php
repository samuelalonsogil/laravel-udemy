@extends('layouts.app')

@section('title', 'Add task')

@section('content')
{{ $errors }}
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input text='text' name="title" id="title"/>
        </div>

        <div>
            <label for="description">Description</label>
            <input name="description" id="description" rows='5'/>
        </div>

        <div>
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description" rows='10'></textarea>
        </div>

        <div>
            <button type="submit">Add task</textarea>
        </div>
    </form>
@endsection