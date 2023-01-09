<?= $this->extend('layouts/nologin') ?>

<?= $this->section('mainContent') ?>

<div class="col-10 col-sm-6 col-lg-4 border border-dark bg-white p-3 rounded-3">
    <h2 class="text-center mb-3">Signup</h2>
    <form action="/carrental/customer/signup" method="post">
        <div class="form-floating mb-3">
            <input type="text" name="fname" class="form-control" id="floatingFName" placeholder="name" value="<?= set_value('fname') ?>">
            <label for="floatingFName">First Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="lname" class="form-control" id="floatingLName" placeholder="name" value="<?= set_value('lname') ?>">
            <label for="floatingLName">Last Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= set_value('email') ?>">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="cpassword" class="form-control" id="floatingCPassword" placeholder="Password">
            <label for="floatingCPassword">Confirm Password</label>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-auto ">
                <label for="city">City:</label>
            </div>
            <div class="col">
                <select name="city" class="form-select" id="city">
                    <?php foreach ($cities as $city):?>
                        <option value=<?=$city?> <?= set_select('city',$city)?>><?=$city?></option>
                        <?php endforeach ?>
                </select>
            </div>
        </div>
        <?php if (isset($validation)) : ?>
            <div class="text-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif ?>
        <div class="row justify-content-center">
            <div class="col-3">
                <button type="submit" class="btn btn-primary ">Signup</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>