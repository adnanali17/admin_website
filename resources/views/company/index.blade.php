@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('company.create') }}" class="btn btn-primary mb-4">Add New Company</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                    <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                   
                                    <td>
                                        @if($company->image)
                                            <img src="{{ Storage::url('company_images/' . $company->image) }}" alt="Company Image" class="img-thumbnail" style="width: 100px;">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('company.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('company.destroy', $company) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
