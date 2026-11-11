<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Projects - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">MyProfile Admin</a>
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button class="btn btn-warning btn-sm">Logout</button>
    </form>
</nav>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Projects</h3>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            + Tambah Project
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Project</th>
                        <th>Teknologi</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{ $projects->firstItem() + $loop->index }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->technologies }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus project ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            Belum ada data project.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $projects->links() }}
    </div>
</div>

</body>
</html>
