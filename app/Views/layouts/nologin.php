<?= $this->extend('layouts/primary') ?>

<?= $this->section('content') ?>
<!-- navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="/carrental">Rent a Car</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $page == "home" ? "active" : "" ?>" aria-current="page" href="/carrental">Available Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == "login" ? "active" : "" ?>" href="/carrental/login">Login</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= $page == "signup" ? "active" : "" ?>" href="javascript: void(0)"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Signup
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item " href="/carrental/customer/signup">Customer</a></li>
                        <li><a class="dropdown-item " href="/carrental/agency/signup">Agency</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link <?= $page == "about" ? "active" : "" ?>" href="/carrental/about">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- navbar end -->
<div class="col">
    <main class="d-flex align-items-center justify-content-center">
        <?= $this->renderSection('mainContent') ?>
    </main>
</div>

<?= $this->endSection() ?>