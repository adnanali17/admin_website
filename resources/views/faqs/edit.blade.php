@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit FAQ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faqs.update', $faq->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" id="question" name="question" class="form-control" value="{{ $faq->question }}" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea id="answer" name="answer" class="form-control" rows="4" required>{{ $faq->answer }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
