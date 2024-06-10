@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <h1>All Questions for: {{ $exam->name }}</h1>

    <h2>Written Questions</h2>
    <ul>
        @forelse ($writtenQuestions as $question)
            <li>
                <a href="{{ route('question.show', $question->id) }}">{{ $question->question_text }}</a>
            </li>
        @empty
            <li>No written questions available for this exam.</li>
        @endforelse
    </ul>

    <h2>MCQ Questions</h2>
    <ol>
        @php $mcqCount = 1; @endphp
        @foreach ($mcqQuestions as $question)
            <li>
                <a href="{{ route('question.show', $question->id) }}">{{ $question->question_text }}</a>
                <ul>
                    @foreach (json_decode($question->options) as $option)
                        <li>{{ $option }}</li>
                    @endforeach
                </ul>
            </li>
            @php $mcqCount++; @endphp
        @endforeach
    </ol>

    @if ($mcqCount === 1)
        <p>No MCQ questions available for this exam.</p>
    @endif

    @if (count($questions) === 0)
        <p>No questions available for this exam.</p>
    @endif
</div>
@endsection
