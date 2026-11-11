<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MyProfile - Aryo Dean</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Lato', sans-serif;
        }

        body {
            margin: 0;
            background: #ffffff;
            color: #333;
        }

        .navbar {
            background-color: #0d6efd;
            padding: 12px 0;
        }

        .navbar-brand {
            color: white !important;
            font-size: 20px;
            font-weight: 400;
        }

        .navbar-nav .nav-link {
            color: rgba(255,255,255,.7);
            font-size: 15px;
            padding: 8px 10px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: white;
        }

        .hero {
            text-align: center;
            padding: 43px 15px 25px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 300;
            margin-bottom: 20px;
        }

        .profile-img {
            width: 195px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .tagline {
            font-size: 18px;
            color: #777;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .hero hr {
            max-width: 760px;
            margin: 20px auto;
            border-color: #ddd;
            opacity: 1;
        }

        .description {
            max-width: 760px;
            margin: auto;
            font-size: 15px;
            line-height: 1.6;
        }

        .btn-project {
            background: #0d6efd;
            color: white;
            padding: 10px 18px;
            border-radius: 7px;
            font-size: 16px;
            margin-top: 12px;
        }

        .btn-project:hover {
            background: #0b5ed7;
            color: white;
        }

        .projects-section {
            margin-top: 15px;
            padding-bottom: 50px;
        }

        .project-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .project-card img {
            height: 190px;
            width: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 34px;
            }

            .profile-img {
                width: 165px;
                height: 185px;
            }

            .navbar-nav {
                padding-top: 10px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="/">MyProfile</a>

        <button class="navbar-toggler bg-light" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/projects">Projects</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/admin/login">Admin</a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<!-- HERO -->
<section class="hero">

    <h1>Halo, Saya Aryo Dean</h1>

    <!-- FOTO PROFIL -->
    <img src="{{ asset('images/profile.jpg') }}"
         class="profile-img"
         alt="Foto Aryo Dean">

    <p class="tagline">
        Saya seorang Mahasiswa Sistem Informasi yang tertarik
        dalam pengembangan aplikasi web modern.
    </p>

    <hr>

    <p class="description" id="about">
        Selamat datang di portfolio website saya.
        Saya memiliki ketertarikan dalam Laravel, Bootstrap,
        pemrograman web, dan berbagai teknologi lainnya.
    </p>

    <a href="/projects" class="btn btn-project">
        Lihat Projects
    </a>

</section>


<!-- PROJECTS -->
<section class="container projects-section">

    <div class="row g-4">

        @forelse($projects as $project)

            <div class="col-md-4">

                <div class="card project-card h-100">

                    @if($project->image)
                        <img src="{{ asset('storage/'.$project->image) }}"
                             alt="{{ $project->title }}">
                    @endif

                    <div class="card-body">

                        <h5>{{ $project->title }}</h5>

                        <p>{{ Str::limit($project->description, 100) }}</p>

                        <a href="{{ route('projects.show', $project->slug) }}"
                           class="btn btn-primary btn-sm">
                            Detail Project
                        </a>

                    </div>
                </div>

            </div>

        @empty

            <div class="col-md-4">
                <div class="card project-card p-3">
                    <h5>Portfolio Website</h5>
                    <p>Website portfolio pribadi menggunakan Laravel 13.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card project-card p-3">
                    <h5>Website E-Commerce</h5>
                    <p>Contoh pengembangan aplikasi penjualan online.</p>
                </div>
            </div>

        @endforelse

    </div>

</section>


<!-- FOOTER -->
<footer class="text-center py-4" id="contact">
    <p class="mb-0">
        © 2026 Aryo Dean Pradana Saputra.
        All Rights Reserved.
    </p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
