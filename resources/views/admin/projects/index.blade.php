<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kelola Project - MyProfile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .main-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 25px;
        }

        .content-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.06);
        }

        .project-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
        }

        .table th {
            background: #f8f9fa;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

<div class="container main-container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Project</h3>
            <p class="text-muted mb-0">
                Kelola semua project portfolio kamu di sini.
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-secondary">
            Kembali ke Dashboard
        </a>
    </div>

    <div class="content-card">

        <!-- NOTIFIKASI -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- TOMBOL TAMBAH -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Daftar Project</h5>

            <a href="{{ route('admin.projects.create') }}"
               class="btn btn-primary">
                + Tambah Project
            </a>
        </div>

        <!-- TABEL PROJECT -->
        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="110">Gambar</th>
                        <th>Nama Project</th>
                        <th>Teknologi</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($projects as $project)

                        <tr>
                            <!-- NOMOR -->
                            <td>
                                {{ $projects->firstItem() + $loop->index }}
                            </td>

                            <!-- GAMBAR -->
                            <td>
                                @if ($project->image)
                                    <img
                                        src="{{ asset('storage/' . $project->image) }}"
                                        alt="{{ $project->title }}"
                                        class="project-image"
                                    >
                                @else
                                    <span class="text-muted small">
                                        Tidak ada gambar
                                    </span>
                                @endif
                            </td>

                            <!-- NAMA PROJECT -->
                            <td>
                                <strong>{{ $project->title }}</strong>
                                <br>
                                <small class="text-muted">
                                    {{ $project->slug }}
                                </small>
                            </td>

                            <!-- TEKNOLOGI -->
                            <td>
                                {{ $project->technologies ?? '-' }}
                            </td>

                            <!-- STATUS -->
                            <td>
                                @if ($project->status == 'Published')
                                    <span class="badge bg-success">
                                        Published
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            <!-- TOMBOL AKSI -->
                            <td>
                                <div class="d-flex gap-2">

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <!-- HAPUS -->
                                    <form
                                        action="{{ route('admin.projects.destroy', $project->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus project {{ $project->title }}?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <p class="text-muted mb-2">
                                    Belum ada project yang ditambahkan.
                                </p>

                                <a href="{{ route('admin.projects.create') }}"
                                   class="btn btn-primary btn-sm">
                                    Tambah Project Sekarang
                                </a>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="mt-3">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
