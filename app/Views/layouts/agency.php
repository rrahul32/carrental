<?= $this->extend('layouts/primary') ?>

<?= $this->section('content') ?>
<!-- navbar -->
<?php //print_r(session('name')) 
?>
<nav class="navbar navbar-expand-sm navbar-dark mb-3 bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/agency">Welcome <?= esc(session('name')) ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $page == "home" ? "active" : "" ?>" aria-current="page" href="/agency">Available Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == "my cars" ? "active" : "" ?>" href="/agency/viewcars">My Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == "bookings" ? "active" : "" ?>" href="/agency/bookings">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == "add car" ? "active" : "" ?>" href="/agency/addcar">Add Car</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == "about" ? "active" : "" ?>" href="/about">About</a>
                </li>
            </ul>
        </div>
        <div>
            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= $page=="profile"? "active" : "" ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/agency/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- navbar end -->
<div class="col">
    <main class="d-flex align-items-center justify-content-center" >
        <?= $this->renderSection('mainContent') ?>
    </main>
</div>

<?= $this->endSection() ?>