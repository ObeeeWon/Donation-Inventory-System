@extends('layouts.public')

@section('content')
<div class="container">
    <h2>Edit User: {{ $user->name }}</h2>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to edit the user -->
    <form method="POST" action="{{ route('admin.updateUser', $user->UserID) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>

        <!-- Role Dropdown -->
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" name="role" required>
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role }}" {{ old('role', $user->role) == $role ? 'selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
        </div>

        <!-- Location Dropdown -->
        <div class="form-group">
            <label for="location">Location</label>
            <select class="form-control" name="location" required>
                <option value="">Select Location</option>
                @foreach($locations as $location)
                    <option value="{{ $location }}" {{ old('location', $user->location) == $location ? 'selected' : '' }}>{{ $location }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection


@section('styles')
@endsection

@section('scripts')
@endsection