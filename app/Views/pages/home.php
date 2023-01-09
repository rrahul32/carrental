<?= $this->extend('layouts/' . $layout) ?>

<?= $this->section('mainContent') ?>

<div class="container justify-content-center">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-sm-6 col-lg-4 border border-dark bg-white p-3 rounded-3">
            <div class="text-center mb-3" id="logo-text">Rent a Car</div>
            <h3 class="mb-3 text-center">Search Cars</h3>
            <form action="/carrental" method="get">
                <div class="row mb-3 align-items-center">
                    <div class="col-auto ">
                        <label for="city">City</label>
                    </div>
                    <div class="col">
                        <select name="city" class="form-select" id="city">
                            <?php foreach ($cities as $city) : ?>
                                <option value=<?= $city ?> <?= set_select('city', $city) ?>><?= $city ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="car" class="form-control" id="floatingInput" placeholder="Toyota Innova">
                    <label for="floatingInput">Car Name</label>
                </div>
                <?php if (isset($validation)) : ?>
                    <div class="text-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif ?>
                <div class="row justify-content-center">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="search">Search</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>