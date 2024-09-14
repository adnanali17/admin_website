@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Team Members') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('team.create') }}" class="btn btn-primary mb-3">Add New Team Member</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Field</th>
                                <th>Description</th>
                                <th>Work History & Feedback</th>
                                <th>Projects Done</th>
                                <th>Success Rate</th>
                                <th>Experience</th>
                                <th>Location</th>
                                <th>Social Links</th>
                                <th>Contact Information</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamMembers as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->field }}</td>
                                    <td>{{ $member->description }}</td>
                                    <td>{{ $member->work_history_feedback }}</td>
                                    <td>{{ $member->projects_done }}</td>
                                    <td>{{ $member->success_rate }}%</td>
                                    <td>{{ $member->experience_years }} years</td>
                                    <td>{{ $member->location }}</td>
                                    <td>
                                        @if($member->linkedin)
                                            <a href="{{ $member->linkedin }}" target="_blank">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        @endif
                                        @if($member->twitter)
                                            <a href="{{ $member->twitter }}" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        @endif
                                        @if($member->facebook)
                                            <a href="{{ $member->facebook }}" target="_blank">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <p>Phone: {{ $member->contact_number }}</p>
                                        <p>Email: {{ $member->email }}</p>
                                        <p>Address: {{ $member->address }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('team.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('team.destroy', $member->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
