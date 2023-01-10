<?= $this->extend('layouts/' . $layout) ?>

<?= $this->section('mainContent') ?>

<div class="container p-3">
    <h2 class="text-center">Available Cars</h2>
    <div class="row">
        <?php if (session()->get('Booked')) : ?>
            <div class="alert alert-success alert-dismissible fade show p-0 m-0" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p class="text-center ">
                    Booking successful!
                </p>
            </div>
        <?php endif ?>
        <?php if (isset($validation)) : ?>
            <div class="text-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif ?>
    </div>
    <div class="row justify-content-center mb-3">
        <form action="/" method="post">
            <?php if (session('type') == 'customer') : ?>
                <div class="col-8 mx-auto border border-dark bg-light py-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <label for="startdate">From:</label>
                            <input type="date" min="<?= date('Y-m-d') ?>" name="startdate" id="startdate">
                        </div>
                        <div class="col-auto">
                            <label for="days">No of days:</label>
                            <select name="days" id="days">
                                <?php for ($i = 1; $i < 30; $i++) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button role="button" type="submit" class="btn btn-primary" name="checkavailable">
                                    Check Availability
                                </button>
                            </div>
                        </div>
                    </div>
            <?php endif ?>
        </form>
    </div>
    <div class="row">
        <?php if (count($cars) > 0) : ?>
            <?php foreach ($cars as $car) : ?>
                <div class="col-auto">

                    <div class="card" style="width: 18rem;">
                        <svg class="card-img-top mx-auto" xmlns="http://www.w3.org/2000/svg" style="width:25%" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                            <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                        </svg>
                    <div class="card-body">
                        <h5 class="card-title"><?= ucwords($car['model']) ?></h5>
                        <p class="card-text">Number: <?= $car['number'] ?></p>
                        <p class="card-text">Capacity: <?= $car['capacity'] ?></p>
                        <h5 class="card-title mb-3"> <?= session()->get('availabilityChecked')?"Rent: &#8377;".((float)$car['rent_per_day'])*((int)(session()->get('POST_DATA')['days'])):"Rent per day: &#8377;$car[rent_per_day]"?></h5>

                        <?php if(session()->get('availabilityChecked')) : ?>
                        <form action="/" method="post">
                        <input type="hidden" name="days" value="<?=session()->get('POST_DATA')['days']?>">
                        <input type="hidden" name="startdate" value="<?=session()->get('POST_DATA')['startdate']?>">
                        <input type="hidden" name="carid" value="<?=$car['id']?>">
                        <div class="row justify-content-center">
                            <button role="button" type="submit" class="btn btn-primary">
                                Rent Car
                            </button>
                        </div>
                    </form>
                    <?php endif ?>
                    <?php if(!isset($_SESSION['isLoggedIn'])):?>
                        <div class="row justify-content-center">
                            <a href="/login" role="button" type="submit" class="btn btn-primary" onclick="return confirm('Please login as customer to rent car.')">
                                Rent Car
                            </a>
                        </div>
                        <?php endif?>
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