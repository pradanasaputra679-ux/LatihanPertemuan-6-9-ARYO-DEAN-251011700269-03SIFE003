<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projects - MyProfile</title>

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

        .project-card {
            border: 1px solid #ddd;
            border-radius: 6px;
            overflow: hidden;
            height: 100%;
        }

        .project-card img {
            width: 100%;
            height: 210px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">MyProfile</a>

        <div class="ms-auto">
            <a href="/" class="btn btn-primary">Home</a>
            <a href="/projects" class="btn btn-primary">Projects</a>
        </div>
    </div>
</nav>

<div class="container py-5">

    <h2 class="mb-4">My Projects</h2>

    <div class="row g-4">

        @forelse($projects as $project)

            <div class="col-md-4">

                <div class="card project-card">

                    @if($project->image)
                        <img src="{{ asset('storage/'.$project->image) }}"
                             alt="{{ $project->title }}">
                    @endif

                    <div class="card-body">

                        <h5>{{ $project->title }}</h5>

                        <p>{{ $project->description }}</p>

                        <p>
                            <strong>Teknologi:</strong>
                            {{ $project->technology }}
                        </p>

                        <a href="{{ route('projects.show', $project->slug) }}"
                           class="btn btn-primary">
                            Detail
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <p>Belum ada project tersedia.</p>

        @endforelse

    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>

</div>

</body>
</html>
