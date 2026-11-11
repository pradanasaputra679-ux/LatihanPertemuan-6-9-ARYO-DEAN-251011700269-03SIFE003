<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - MyProfile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #212529;
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 15px;
            color: white;
        }

        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: #ddd;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #0d6efd;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 25px;
        }

        .topbar {
            background: #ffc107;
            padding: 18px 25px;
            margin: -25px -25px 25px;
        }

        .stat-card {
            border: none;
            border-radius: 10px;
        }

        .project-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: 0.2s;
        }

        .project-card:hover {
            transform: translateY(-4px);
        }

        .project-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                min-height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                margin: -25px -25px 25px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>MyProfile Admin</h4>

        <a href="{{ route('admin.dashboard') }}" class="active">
            Dashboard
        </a>

        <a href="{{ route('admin.projects.index') }}">
            Kelola Project
        </a>

        <hr>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                Logout
            </button>
        </form>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Dashboard Admin</h5>
            <span>Selamat Datang, Aryo!</span>
        </div>

        <!-- GREETING -->
        <div class="mb-4">
            <h3 class="fw-bold">Halo, Aryo Dean!</h3>
            <p class="text-muted">
                Selamat datang di halaman administrator website portfolio.
            </p>
        </div>

        <!-- STATISTIK -->
        <div class="row g-4 mb-4">

            <div class="col-md-4">
                <div class="card stat-card shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Total Project</h6>
                        <h2 class="fw-bold text-primary">
                            {{ $totalProjects ?? 0 }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Status Admin</h6>
                        <h4 class="fw-bold text-success">Aktif</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Website</h6>
                        <h4 class="fw-bold">MyProfile</h4>
                    </div>
                </div>
            </div>

        </div>

        <!-- DAFTAR PROJECT -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="fw-bold mb-1">Project Terbaru</h4>
                <p class="text-muted mb-0">
                    Daftar project yang sudah ditambahkan.
                </p>
            </div>

            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                Lihat Semua
            </a>
        </div>

        <div class="row g-4">

            @forelse($projects ?? [] as $project)

                <div class="col-md-6 col-lg-4">
                    <div class="card project-card shadow-sm h-100">

                        @if($project->image)
                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                class="project-image"
                                alt="{{ $project->title }}"
                            >
                        @else
                            <div class="project-image bg-secondary text-white d-flex justify-content-center align-items-center">
                                Belum ada gambar
                            </div>
                        @endif

                        <div class="card-body">

                            <h5 class="card-title fw-bold">
                                {{ $project->title }}
                            </h5>

                            <p class="text-muted small">
                                {{ \Illuminate\Support\Str::limit($project->description, 90) }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge {{ $project->status == 'Published' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $project->status }}
                                </span>

                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-info">
                        Belum ada project. Silakan tambahkan project terlebih dahulu.
                    </div>
                </div>

            @endforelse

        </div>

    </div>

</body>
</html>
