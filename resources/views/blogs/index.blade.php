@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Blogs</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Create New Blog</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ Str::limit($blog->content, 50) }}</td> <!-- Limit content length -->
                        <td>{{ $blog->category->name }}</td>
                        <td>
                            @foreach($blog->tags as $tag)
                                <span class="badge bg-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-info">View Comments</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
