@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create FAQ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faqs.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" id="question" name="question" class="form-control" value="{{ old('question') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea id="answer" name="answer" class="form-control" rows="4" required>{{ old('answer') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save FAQ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
