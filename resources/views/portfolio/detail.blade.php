<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $project->title }} - MyProfile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #0d6efd;
        }

        .navbar a {
            color: white;
        }

        .project-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .content {
            padding-top: 50px;
            padding-bottom: 70px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-white" href="/">MyProfile</a>

        <div class="ms-auto">
            <a href="/" class="btn btn-primary">Home</a>
            <a href="/projects" class="btn btn-primary">Projects</a>
        </div>
    </div>
</nav>

<div class="container content">

    <a href="/projects" class="btn btn-outline-primary mb-4">
        &larr; Kembali ke Projects
    </a>

    <h1 class="fw-bold mb-3">
        {{ $project->title }}
    </h1>

    <p class="text-secondary">
        Teknologi: {{ $project->technology }}
    </p>

    @if($project->image)
        <img src="{{ asset('storage/'.$project->image) }}"
             class="project-image mb-4"
             alt="{{ $project->title }}">
    @endif

    <h4>Deskripsi Project</h4>

    <p class="text-secondary">
        {{ $project->description }}
    </p>

</div>

<footer class="text-center py-4 bg-light">
    © 2026 Aryo Dean Pradana Saputra. All Rights Reserved.
</footer>

</body>
</html>
