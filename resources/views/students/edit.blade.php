@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="d-flex align-items-center gap-2 mb-4">
            <a href="{{ route('students.index') }}" style="color:#7a8a78;font-size:13px;text-decoration:none">
                <i class="bi bi-chevron-left"></i> Students
            </a>
            <span style="color:#c8c0b0">/</span>
            <span style="font-size:13px;color:#1e3d2f;font-weight:600">Edit Student</span>
        </div>

        <div class="card">

            <div class="card-header-custom">
                <span class="title">
                    <i class="bi bi-pencil-square me-2" style="color:#3a8a5a"></i>Edit Student
                </span>
                <span style="font-size:11px;color:#8a8070">ID #{{ $student->id }}</span>
            </div>

            <div class="card-body p-4">

                @if ($errors->any())
                    <div class="alert alert-danger mb-3" style="border-radius:9px;font-size:13px;background:#fef5f0;border:1px solid #f5c4b3;color:#712b13">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $student->name) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $student->email) }}"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Age</label>
                        <input type="number"
                               name="age"
                               class="form-control"
                               value="{{ old('age', $student->age) }}"
                               min="1" max="150"
                               required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('students.index') }}" class="btn btn-sms-outline">
                            <i class="bi bi-arrow-left me-1"></i> Back
                        </a>
                        <button type="submit" class="btn btn-sms-primary">
                            <i class="bi bi-check-circle me-1"></i> Update Student
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection