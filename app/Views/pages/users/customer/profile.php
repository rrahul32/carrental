<?= $this->extend('layouts/customer') ?>

<?= $this->section('mainContent') ?>

    <div class="col-6 mx-auto border border-dark py-3 bg-light">
        <h2 class="text-center mb-3">Profile</h2>
        <div class="row mb-3 justify-content-center">
            <div class="col-auto">
                <label for="name">
                    First Name:
                </label>
            </div>
            <div class="col-auto">
                <p id="name"><?= $profile['fname'] ?></p>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-auto">
                <label for="name">
                    Last Name:
                </label>
            </div>
            <div class="col-auto">
                <p id="name"><?= $profile['lname'] ?></p>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-auto">
                <label for="email">
                    Email Address:
                </label>
            </div>
            <div class="col-auto">
                <p id="email"><?= $profile['email'] ?></p>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-auto">
                <label for="city">
                    City:
                </label>
            </div>
            <div class="col-auto">
                <p id="city"><?= $profile['city'] ?></p>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>