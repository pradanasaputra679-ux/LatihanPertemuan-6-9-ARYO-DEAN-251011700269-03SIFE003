<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Project - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
        MyProfile Admin
    </a>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-light btn-sm">
        Kembali
    </a>
</nav>

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 750px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Project Baru</h4>
        </div>

        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.projects.store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Project</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ old('title') }}" required
                           placeholder="Contoh: Website Portfolio">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Project</label>
                    <textarea name="description" class="form-control"
                              rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teknologi yang Digunakan</label>
                    <input type="text" name="technologies" class="form-control"
                           value="{{ old('technologies') }}"
                           placeholder="Contoh: Laravel, Bootstrap, MySQL">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Project</label>
                    <input type="file" name="image" class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.</small>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status Project</label>
                    <select name="status" class="form-select" required>
                        <option value="Published">Published</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Project
                </button>

                <a href="{{ route('admin.projects.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
