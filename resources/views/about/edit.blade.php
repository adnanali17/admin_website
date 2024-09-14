@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit About Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Edit Form -->
                    <form method="POST" action="{{ route('about.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if($aboutPage && $aboutPage->image)
                                <img src="{{ Storage::url('about_images/' . $aboutPage->image) }}" alt="About Image" class="img-fluid mt-2" style="max-height: 150px;">
                            @endif
                        </div>

                        <!-- Skills -->
                        <div class="form-group">
                            <label for="skills">Skills (comma separated)</label>
                            <input type="text" name="skills" id="skills" class="form-control" value="{{ old('skills', $aboutPage ? $aboutPage->skills : '') }}" required>
                        </div>

                        <!-- YouTube Link -->
                        <div class="form-group">
                            <label for="youtube_link">YouTube Video Link</label>
                            <input type="text" name="youtube_link" id="youtube_link" class="form-control" value="{{ old('youtube_link', $aboutPage ? $aboutPage->youtube_link : '') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
