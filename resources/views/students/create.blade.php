@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="d-flex align-items-center gap-2 mb-4">
            <a href="{{ route('students.index') }}" style="color:#7a8a78;font-size:13px;text-decoration:none">
                <i class="bi bi-chevron-left"></i> Students
            </a>
            <span style="color:#c8c0b0">/</span>
            <span style="font-size:13px;color:#1e3d2f;font-weight:600">Add New Student</span>
        </div>

        <div class="card">

            <div class="card-header-custom">
                <span class="title">
                    <i class="bi bi-person-plus-fill me-2" style="color:#3a8a5a"></i>Add New Student
                </span>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name"
                               value="{{ old('name') }}"
                               placeholder="e.g. Juan dela Cruz"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="e.g. juan@email.com"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="age" class="form-label">Age</label>
                        <input type="number"
                               class="form-control @error('age') is-invalid @enderror"
                               id="age" name="age"
                               value="{{ old('age') }}"
                               placeholder="e.g. 20"
                               min="1" max="150"
                               required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-sms-primary">
                            <i class="bi bi-save me-1"></i> Save Student
                        </button>
                        <a href="{{ route('students.index') }}" class="btn btn-sms-outline">
                            <i class="bi bi-arrow-left me-1"></i> Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection