@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Pricing Plan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pricing.update', $pricing->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="plan_name">Plan Name</label>
                            <input type="text" name="plan_name" id="plan_name" class="form-control" value="{{ $pricing->plan_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $pricing->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="features">Features (separate with commas)</label>
                            <input type="text" name="features[]" id="features" class="form-control" value="{{ implode(',', json_decode($pricing->features)) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $pricing->price }}" step="0.01" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
