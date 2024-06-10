@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <h1>Create Question for: {{ $exam->name }}</h1>

    <form method="POST" action="{{ route('question.store', $exam->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="question_text">Question Text</label>
            <textarea name="question_text" id="question_text" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="qtype">Question Type</label>
            <select name="qtype" id="qtype" class="form-control" required>
                <option value="multiple_choice">Multiple Choice</option>
                <option value="written">Written/File Upload</option>
                <!-- Add more question types if needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="filename">Attachment (if Written/File Upload)</label>
            <input type="file" name="filename" id="filename" class="form-control">
        </div>

        <div class="form-group">
            <label for="options">Options(if MCQ) (One option per line)</label>
            <textarea name="options" id="options" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Question</button>
    </form>
</div>
@endsection
