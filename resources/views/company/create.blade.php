@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add New Company') }}</div>

                <div class="card-body">
                    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                       
                        <div class="form-group">
                            <label for="image">Company Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Add Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
