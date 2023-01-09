<?= $this->extend('layouts/' . $layout) ?>

<?= $this->section('mainContent') ?>

<div class="container justify-content-center">
    <div class="row justify-content-center align-items-center">
        <div class="col-10 col-sm-6 col-lg-4 border border-dark bg-white p-3 rounded-3">
            <div class="text-center mb-3" id="logo-text">Rent a Car</div>
            <h3 class="mb-3 text-center">Search Cars</h3>
            <form action="/carrental" method="get">
                <div class="row justify-content-center">
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
                    <?php //if (session('type') == 'customer') : 
                    if (true) :
                    ?>
                        <div class="mb-3 row">
                            <div class="col-auto ">
                                <label for="startDate">Start Date:</label>
                            </div>
                            <div class="col-auto">
                                <input type="date" name="startDate" class="form-control" id="startDate" min="<?= date("Y-m-d") ?>">
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-auto ">
                                <label for="days">No of Days:</label>
                            </div>
                            <div class="col">
                                <select name="days" class="form-select" id="days">
                                    <?php for ($i = 1; $i < 31; $i++) : ?>
                                        <option value=<?= $i ?> <?= set_select('days', $i) ?>><?= $i ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if (isset($validation)) : ?>
                        <div class="text-danger">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif ?>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary " name="search">Search</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>