<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Project - MyProfile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="form-container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Edit Project</h3>

            <a href="{{ route('admin.projects.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data yang kamu masukkan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label">Judul Project</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $project->title) }}"
                    required
                >
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea
                    name="description"
                    class="form-control"
                    rows="4"
                    required
                >{{ old('description', $project->description) }}</textarea>
            </div>

            <!-- Teknologi -->
            <div class="mb-3">
                <label class="form-label">Teknologi</label>
                <input
                    type="text"
                    name="technologies"
                    class="form-control"
                    value="{{ old('technologies', $project->technologies) }}"
                >
            </div>

            <!-- Gambar Lama -->
            <div class="mb-3">
                <label class="form-label d-block">Gambar Saat Ini</label>

                @if ($project->image)
                    <img
                        src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->title }}"
                        style="width: 200px; height: 130px; object-fit: cover;"
                        class="rounded mb-2"
                    >
                @else
                    <p class="text-muted">Belum ada gambar.</p>
                @endif
            </div>

            <!-- Gambar Baru -->
            <div class="mb-3">
                <label class="form-label">Ganti Gambar (Opsional)</label>
                <input
                    type="file"
                    name="image"
                    class="form-control"
                    accept=".jpg,.jpeg,.png,.webp"
                >
                <small class="text-muted">
                    Kosongkan jika ingin tetap menggunakan gambar lama.
                    Maksimal 2 MB.
                </small>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="form-label">Status Project</label>

                <select name="status" class="form-select" required>
                    <option value="Published"
                        {{ old('status', $project->status) == 'Published' ? 'selected' : '' }}>
                        Published
                    </option>

                    <option value="Draft"
                        {{ old('status', $project->status) == 'Draft' ? 'selected' : '' }}>
                        Draft
                    </option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    Update Project
                </button>

                <a href="{{ route('admin.projects.index') }}"
                   class="btn btn-outline-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>
