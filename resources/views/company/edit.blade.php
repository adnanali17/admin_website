@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Company') }}</div>

                <div class="card-body">
                    <form action="{{ route('company.update', $company) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                     

                        <div class="form-group">
                            <label for="image">Company Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($company->image)
                                <img src="{{ Storage::url('company_images/' . $company->image) }}" alt="Company Image" class="img-thumbnail mt-2" style="width: 100px;">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Update Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
