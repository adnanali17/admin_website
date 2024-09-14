@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- Buttons for navigating to Blogs, Categories, Tags, Logo, About, and Pricing -->
                    <div class="mt-4">
                        <a href="{{ route('blogs.index') }}" class="btn btn-primary">
                            {{ __('Manage Blogs') }}
                        </a>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                            {{ __('Manage Categories') }}
                        </a>
                        <a href="{{ route('tags.index') }}" class="btn btn-success">
                            {{ __('Manage Tags') }}
                        </a>
                        <a href="{{ route('logo.show') }}" class="btn btn-info">
                            {{ __('Manage Logo') }}
                        </a>
                        <a href="{{ route('about.show') }}" class="btn btn-warning">
                            {{ __('Manage About Page') }}
                        </a>
                        <a href="{{ route('pricing.index') }}" class="btn btn-dark">
                            {{ __('Manage Pricing') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
