<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f0ece3;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 220px;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            background: #1e3d2f;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px 18px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        .sidebar-brand-icon {
            width: 36px; height: 36px;
            background: rgba(134,197,160,0.22);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 17px;
            flex-shrink: 0;
        }

        .sidebar-brand-name {
            font-size: 13.5px;
            font-weight: 700;
            letter-spacing: 0.3px;
            line-height: 1.2;
            color: #fff;
        }

        .sidebar-brand-sub {
            font-size: 10px;
            color: rgba(255,255,255,0.35);
            margin-top: 1px;
        }

        .sidebar-section {
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.25);
            padding: 14px 18px 4px;
        }

        .sidebar a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 8px 12px;
            margin: 1px 8px;
            border-radius: 8px;
            font-size: 12.5px;
            transition: background .15s, color .15s;
        }

        .sidebar a:hover,
        .sidebar a.active-link {
            background: rgba(134, 197, 160, 0.15);
            color: #fff;
        }

        .sidebar a .bi { font-size: 14px; width: 16px; text-align: center; }

        .sidebar-submenu {
            border-left: 2px solid rgba(134,197,160,0.35);
            margin-left: 24px !important;
            padding-left: 0 !important;
        }

        .sidebar-submenu a {
            font-size: 12px;
            padding: 6px 10px;
            color: rgba(255,255,255,0.5);
            margin: 1px 6px 1px 0;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 14px 14px 18px;
        }

        .sidebar-stat-box {
            background: rgba(134, 197, 160, 0.13);
            border: 1px solid rgba(134, 197, 160, 0.22);
            border-radius: 10px;
            padding: 12px 14px;
        }

        .sidebar-stat-box .label {
            font-size: 10.5px;
            font-weight: 600;
            color: rgba(196, 221, 201, 0.85);
            letter-spacing: .3px;
        }

        .sidebar-stat-box .number {
            font-size: 28px;
            font-weight: 800;
            color: #fff;
            line-height: 1.1;
            margin-top: 2px;
        }

        .sidebar-stat-box .sub {
            font-size: 10px;
            color: rgba(255,255,255,0.3);
            margin-top: 2px;
        }

        /* ── CONTENT ── */
        .content {
            margin-left: 220px;
            padding: 28px;
            background: #f0ece3;
            min-height: 100vh;
        }

        /* ── CARD ── */
        .card {
            border: 1px solid #ddd6c8 !important;
            border-radius: 14px !important;
            box-shadow: none !important;
            background: #ffffff;
        }

        .card-header-custom {
            background: #faf7f2;
            border-bottom: 1px solid #e8e0d0;
            padding: 14px 20px;
            border-radius: 14px 14px 0 0 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-custom .title {
            font-size: 14px;
            font-weight: 700;
            color: #1e3d2f;
        }

        /* ── ALERT ── */
        .alert-success {
            background: #edf6ef;
            border: 1px solid #b2d8b8;
            border-radius: 10px;
            color: #1e3d2f;
            font-size: 13px;
        }

        /* ── FORM CONTROLS ── */
        .form-label {
            font-size: 12.5px;
            font-weight: 600;
            color: #2d5a3d;
            margin-bottom: 5px;
        }

        .form-control {
            border: 1px solid #d0c8b8;
            border-radius: 9px;
            font-size: 13px;
            padding: 9px 13px;
            background: #fdfcf9;
            color: #2c2416;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-control:focus {
            border-color: #3a8a5a;
            box-shadow: 0 0 0 3px rgba(58, 138, 90, 0.12);
            background: #fff;
        }

        .form-control::placeholder { color: #b0a898; }

        /* ── BUTTONS ── */
        .btn-sms-primary {
            background: #1e3d2f;
            color: #fff;
            border: none;
            border-radius: 9px;
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .2px;
            transition: background .15s;
        }

        .btn-sms-primary:hover { background: #162e23; color: #fff; }

        .btn-sms-outline {
            background: transparent;
            color: #4a7a58;
            border: 1px solid #b8cfc0;
            border-radius: 9px;
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 500;
            transition: background .15s;
        }

        .btn-sms-outline:hover { background: #f0f7f2; color: #1e3d2f; }

        /* ── TABLE ── */
        .sms-table { width: 100%; border-collapse: collapse; }

        .sms-table thead th {
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: .7px;
            text-transform: uppercase;
            color: #7a8a78;
            background: #faf7f2;
            padding: 11px 16px;
            border-bottom: 1px solid #e8e0d0;
        }

        .sms-table tbody td {
            padding: 10px 16px;
            font-size: 13px;
            color: #2c2416;
            border-bottom: 1px solid #f0ece3;
            vertical-align: middle;
        }

        .sms-table tbody tr:last-child td { border-bottom: none; }
        .sms-table tbody tr:hover td { background: #f7f4ee; }

        .badge-num {
            width: 24px; height: 24px;
            border-radius: 50%;
            background: #e8e0d0;
            color: #6a5a3a;
            font-size: 11px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .badge-age {
            background: #e0f5ec;
            color: #0f6e56;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 20px;
        }

        .action-btn {
            width: 30px; height: 30px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: all .15s;
            text-decoration: none;
            border: 1px solid;
        }

        .action-btn.edit {
            background: #eaf5ef;
            border-color: #b8ddc5;
            color: #1e6640;
        }

        .action-btn.edit:hover { background: #d4eedd; }

        .action-btn.del {
            background: #fef5f5;
            border-color: #fecaca;
            color: #dc2626;
        }

        .action-btn.del:hover { background: #fee2e2; }
    </style>
</head>
<body>

{{-- SIDEBAR --}}
<div class="sidebar">

    <div class="sidebar-brand">
        <div class="sidebar-brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <div>
            <div class="sidebar-brand-name">SMS Admin</div>
            <div class="sidebar-brand-sub">Student Management</div>
        </div>
    </div>

    <div class="sidebar-section">Main</div>
    <a href="{{ route('students.index') }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <div class="sidebar-section">Users</div>
    <a data-bs-toggle="collapse" href="#userMenu" role="button" aria-expanded="true">
        <i class="bi bi-people"></i> User Management
        <i class="bi bi-chevron-down ms-auto" style="font-size:10px"></i>
    </a>

    <div class="collapse show sidebar-submenu" id="userMenu">
        <a href="{{ route('students.index') }}">
            <i class="bi bi-person-lines-fill"></i> Students
        </a>
        <a href="{{ route('students.create') }}">
            <i class="bi bi-person-plus"></i> Add Student
        </a>
    </div>

    <div class="sidebar-footer">
        <div class="sidebar-stat-box">
            <div class="label">
                <i class="bi bi-people-fill me-1"></i> Total Students
            </div>
            <div class="number">{{ $totalStudents ?? 0 }}</div>
            <div class="sub">Registered in system</div>
        </div>
    </div>

</div>

{{-- MAIN CONTENT --}}
<div class="content">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>