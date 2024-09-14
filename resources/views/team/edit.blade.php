@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Team Member') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('team.update', $teamMember->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $teamMember->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="field">Field</label>
                            <input type="text" name="field" id="field" class="form-control" value="{{ old('field', $teamMember->field) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $teamMember->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="work_history_feedback">Work History & Feedback</label>
                            <textarea name="work_history_feedback" id="work_history_feedback" class="form-control" rows="4" required>{{ old('work_history_feedback', $teamMember->work_history_feedback) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="projects_done">Projects Done</label>
                            <input type="number" name="projects_done" id="projects_done" class="form-control" value="{{ old('projects_done', $teamMember->projects_done) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="success_rate">Success Rate (%)</label>
                            <input type="number" name="success_rate" id="success_rate" class="form-control" value="{{ old('success_rate', $teamMember->success_rate) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="experience_years">Experience (Years)</label>
                            <input type="number" name="experience_years" id="experience_years" class="form-control" value="{{ old('experience_years', $teamMember->experience_years) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $teamMember->location) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="linkedin">LinkedIn</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ old('linkedin', $teamMember->linkedin) }}">
                        </div>

                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" id="twitter" class="form-control" value="{{ old('twitter', $teamMember->twitter) }}">
                        </div>

                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', $teamMember->facebook) }}">
                        </div>

                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $teamMember->contact_number) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $teamMember->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $teamMember->address) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
