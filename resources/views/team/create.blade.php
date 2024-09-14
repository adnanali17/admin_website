@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Team Member') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('team.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="field">Field</label>
                            <input type="text" name="field" id="field" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="work_history_feedback">Work History & Feedback</label>
                            <textarea name="work_history_feedback" id="work_history_feedback" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="projects_done">Projects Done</label>
                            <input type="number" name="projects_done" id="projects_done" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="success_rate">Success Rate (%)</label>
                            <input type="number" name="success_rate" id="success_rate" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="experience_years">Experience (Years)</label>
                            <input type="number" name="experience_years" id="experience_years" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="linkedin">LinkedIn</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" id="twitter" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
