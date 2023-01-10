<?= $this->extend('layouts/agency') ?>

<?= $this->section('mainContent') ?>

<div class="container">
    <h2 class="text-center mb-3">My Cars</h2>
    <div class="row mt-3" id="carCards">
            <?php if (count($allCars) > 0) : ?>
                <?php foreach ($allCars as $car) : ?>
                    <div class="col-auto">

                        <div class="card" style="width: 18rem;">
                            <svg class="card-img-top mx-auto" xmlns="http://www.w3.org/2000/svg" style="width: 25%;" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                            </svg>
                            <div class="card-body">
                                <h5 class="card-title"><?= ucwords($car['model']) ?></h5>
                                <p class="card-text">Capacity: <?= $car['capacity'] ?></p>
                                <h4 class="card-title"> Rent per day: &#8377;<?= $car['rent_per_day'] ?></h4>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php else : ?>
                    <div class="d-flex position-fixed top-50 justify-content-center start-0" style="width: 100%;">
                        <h2>No cars found!!!</h2>
                    </div>
                <?php endif ?>
    </div>
</div>
<?= $this->endSection() ?>