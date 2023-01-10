<?= $this->extend('layouts/agency') ?>

<?= $this->section('mainContent') ?>

<div class="col-10 col-sm-6 col-lg-4 border border-dark bg-white p-3 rounded-3">
    <h2 class="text-center mb-3">Add Car</h2>
    <?php if(session()->get('car_added')):?>
        <div class="alert alert-success alert-dismissible fade show p-0 m-0" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p class="text-center">
                    Car details added successfully!!!</p>
        </div>
        <?php endif?>
    <form action="/carrental/agency/addcar" method="post">
        <div class="form-floating mb-3">
            <input type="text" name="model" class="form-control" id="floatingModel" placeholder="name" value="<?= set_value('model') ?>">
            <label for="floatingModel">Model</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="number" class="form-control" id="floatingNumber" placeholder="KL08AP0000" value="<?= set_value('number') ?>">
            <label for="floatingNumber">Number</label>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-auto ">
                <label for="capacity">Seating Capacity:</label>
            </div>
            <div class="col">
                <select name="capacity" class="form-select" id="capacity">
                    <?php for ($i = 2; $i < 10; $i++) : ?>
                        <option value=<?= $i ?> <?= set_select('capacity', $i) ?>><?= $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-auto">
                <label for="rate">Rate Per Day:</label>
            </div>
            <div class="col input-group">
                <span class="input-group-text" id="basic-addon1">&#8377</span>
                <input type="number" name="rate" class="form-control" placeholder="123456.00" aria-label="rate" aria-describedby="basic-addon1">
            </div>
        </div>
        <?php if (isset($validation)) : ?>
            <div class="text-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif ?>
        <div class="row justify-content-center">
            <div class="col-3">
                <button type="submit" class="btn btn-primary ">Add Car</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>