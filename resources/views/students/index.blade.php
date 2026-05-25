@extends('layouts.app')

@section('content')

<div class="container-fluid py-1">

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0" style="color:#1e3d2f;font-size:20px">
                Student Dashboard
            </h3>

            <small style="color:#7a8a78">
                Manage, edit, and track all registered students
            </small>
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-sms-primary">
            <i class="bi bi-person-plus me-1"></i>
            Add Student
        </a>
    </div>

    <div class="card">

        {{-- HEADER --}}
        <div class="card-header-custom">

            <span class="title">
                <i class="bi bi-table me-2" style="color:#3a8a5a"></i>
                All Students
            </span>

            <span style="
                font-size:11px;
                color:#6a7a68;
                background:#e8e8d8;
                padding:2px 10px;
                border-radius:20px;
                font-weight:600">

                {{ $students->count() }} records
            </span>

        </div>

        {{-- SEARCH BAR --}}
        <div style="
            padding:10px 20px;
            border-bottom:1px solid #e8e0d0;
            background:#fdfcf9">

            <form method="GET" action="{{ route('students.index') }}">

                <div style="
                    display:flex;
                    gap:8px;
                    align-items:center;
                    flex-wrap:wrap">

                    {{-- LONG + EXTRA THIN INPUT --}}
                    <div style="
                        position:relative;
                        flex:1;
                        width:100%">

                        <i class="bi bi-search" style="
                            position:absolute;
                            left:12px;
                            top:50%;
                            transform:translateY(-50%);
                            color:#9a9080;
                            font-size:12px">
                        </i>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search by name or email..."
                            class="form-control"
                            style="
                                padding-left:34px;
                                height:34px;
                                border-radius:8px;
                                border:1px solid #d8d0c0;
                                font-size:13px;
                                background:#fff;
                                box-shadow:none;">
                    </div>

                    {{-- SEARCH BUTTON --}}
                    <button
                        type="submit"
                        class="btn btn-sms-primary"
                        style="
                            height:34px;
                            padding:0 14px;
                            border-radius:8px;
                            font-size:13px;
                            font-weight:600">

                        <i class="bi bi-search me-1"></i>
                        Search
                    </button>

                    {{-- CLEAR BUTTON --}}
                    @if(request('search'))

                        <a
                            href="{{ route('students.index') }}"
                            class="btn btn-sms-outline"
                            style="
                                height:34px;
                                padding:0 14px;
                                border-radius:8px;
                                display:flex;
                                align-items:center;
                                font-size:13px;">

                            <i class="bi bi-x-circle me-1"></i>
                            Clear
                        </a>

                    @endif

                </div>

            </form>

        </div>

        <div class="card-body p-0">

            @if ($students->count() > 0)

                <div class="table-responsive">

                    <table class="sms-table">

                        <thead>
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Date Added</th>
                                <th class="text-center pe-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($students as $index => $student)

                                <tr>

                                    <td class="ps-4">
                                        <span class="badge-num">
                                            {{ $index + 1 }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="fw-semibold" style="color:#1e3d2f">
                                            <i class="bi bi-person-circle me-1"
                                               style="color:#3a8a5a"></i>

                                            {{ $student->name }}
                                        </div>
                                    </td>

                                    <td style="color:#7a8a78">
                                        <i class="bi bi-envelope me-1"></i>
                                        {{ $student->email }}
                                    </td>

                                    <td>
                                        <span class="badge-age">
                                            {{ $student->age }} yrs
                                        </span>
                                    </td>

                                    <td style="color:#8a8070">
                                        <i class="bi bi-calendar-event me-1"></i>

                                        {{ $student->created_at->format('M d, Y') }}
                                    </td>

                                    <td class="text-center pe-4">

                                        {{-- EDIT --}}
                                        <a href="{{ route('students.edit', $student->id) }}"
                                           class="action-btn edit me-1">

                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <form
                                            action="{{ route('students.destroy', $student->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Delete this student?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn del"
                                                style="cursor:pointer">

                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="text-center py-5">

                    <div class="mb-3">

                        @if(request('search'))
                            <i class="bi bi-search display-4"
                               style="color:#c8c0b0"></i>
                        @else
                            <i class="bi bi-people display-4"
                               style="color:#c8c0b0"></i>
                        @endif

                    </div>

                    @if(request('search'))

                        <h5 class="fw-semibold" style="color:#1e3d2f">
                            No results found
                        </h5>

                        <p style="color:#8a8070;font-size:13px">
                            No students matched
                            "<strong>{{ request('search') }}</strong>".
                            Try a different keyword.
                        </p>

                        <a href="{{ route('students.index') }}"
                           class="btn btn-sms-outline mt-2">

                            <i class="bi bi-x-circle me-1"></i>
                            Clear Search
                        </a>

                    @else

                        <h5 class="fw-semibold" style="color:#1e3d2f">
                            No students found
                        </h5>

                        <p style="color:#8a8070;font-size:13px">
                            Start by adding your first student to the system.
                        </p>

                        <a href="{{ route('students.create') }}"
                           class="btn btn-sms-primary mt-2">

                            <i class="bi bi-plus-circle me-1"></i>
                            Add First Student
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>

</div>

@endsection