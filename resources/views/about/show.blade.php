@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('About Us') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Display Image -->
                    @if($aboutPage->image)
                        <img src="{{ Storage::url('about_images/' . $aboutPage->image) }}" alt="About Image" class="img-fluid mb-4">
                    @endif

                    <!-- Display Skills -->
                    <h3>Skills</h3>
                    <ul>
                        @foreach (explode(',', $aboutPage->skills) as $skill)
                            <li>{{ $skill }}</li>
                        @endforeach
                    </ul>

                    <!-- Display YouTube Video -->
                    @if($aboutPage->youtube_link)
                        <h3>Watch Our Video</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $aboutPage->youtube_link }}" allowfullscreen></iframe>
                        </div>
                    @endif

                    <!-- Link to Edit Page -->
                    <a href="{{ route('about.edit') }}" class="btn btn-primary mt-4">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
