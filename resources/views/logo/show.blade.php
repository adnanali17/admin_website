@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Logo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($logo && $logo->image)
                        <img src="{{ Storage::url('logos/' . $logo->image) }}" alt="Logo" class="img-fluid">
                    @else
                        <p>No logo image available.</p>
                    @endif

                    <a href="{{ route('logo.edit') }}" class="btn btn-primary mt-4">Edit Logo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
