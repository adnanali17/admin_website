@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Logo') }}</div>

                <div class="card-body">
                    <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="image">Logo Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update Logo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
