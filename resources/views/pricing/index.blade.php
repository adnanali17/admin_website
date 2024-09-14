@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pricing Plans') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Description</th>
                                <th>Features</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pricings as $pricing)
                                <tr>
                                    <td>{{ $pricing->plan_name }}</td>
                                    <td>{{ $pricing->description }}</td>
                                    <td>
                                        <ul>
                                            @foreach (json_decode($pricing->features) as $feature)
                                                <li>{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>${{ number_format($pricing->price, 2) }}</td>
                                    <td>
                                        <a href="{{ route('pricing.edit', $pricing->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('pricing.create') }}" class="btn btn-success mt-4">Add New Plan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
