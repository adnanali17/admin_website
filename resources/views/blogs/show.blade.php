@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $blog->title }}</h1>
    <div>{{ $blog->content }}</div>

    <h2>Comments</h2>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
        <div class="mb-3">
            <label for="content" class="form-label">Add Comment</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="comments-section mt-4">
        @foreach($blog->comments as $comment)
            <div class="comment mt-4">
                <div class="comment-content">
                    <p>{{ $comment->content }}</p>
                    <form action="{{ route('comments.reply', $blog->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <div class="mb-3">
                            <label for="reply-content-{{ $comment->id }}" class="form-label visually-hidden">Reply</label>
                            <textarea class="form-control reply-textarea" id="reply-content-{{ $comment->id }}" name="content" rows="2" placeholder="Write a reply..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary btn-sm">Reply</button>
                    </form>
                </div>
                @foreach($comment->replies as $reply)
                    <div class="reply ms-4 mt-2">
                        <div class="reply-content">
                            <p>{{ $reply->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

@section('styles')
<style>
    .comment, .reply {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        background-color: #f9f9f9;
    }

    .comment-content {
        margin-bottom: 10px;
    }

    .reply {
        background-color: #f1f1f1;
        border: none;
    }

    .reply-content {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #ffffff;
    }

    .reply-textarea {
        resize: none;
    }

    .comments-section {
        margin-top: 20px;
    }
</style>
@endsection
@endsection
