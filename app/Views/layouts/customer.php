<?= $this->extend('layouts/primary') ?>

<?= $this->section('content') ?>
<!-- navbar -->
<nav class="navbar navbar-expand-sm navbar-dark mb-3 bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/carrental">Rent a Car</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= $page=="home"?"active":"" ?>" aria-current="page" href="/carrental">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page=="login"?"active":"" ?>" href="/carrental/login">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page=="signup"?"active":"" ?>" href="/carrental/signup">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page=="about"?"active":"" ?>" href="/carrental/about">About</a>
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