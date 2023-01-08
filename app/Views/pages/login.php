<?= $this->extend('layouts/nologin') ?>

<?= $this->section('content') ?>
<?= isset($post) ? print_r($post) : '' ?>
<div class="col-10 col-sm-6 col-lg-4 border border-dark bg-white p-3 rounded-3">
    <h2 class="text-center mb-3">Login</h2>
    <?php if(session()->get('reg_success')):?>
        <div class="alert alert-success alert-dismissible fade show p-0 m-0" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p class="text-center p-0 m-0">
                    Registration successful!<br>
                    Please login to continue. 
                </p>
                
        </div>
        <?php endif?>
    <form action="/carrental/login" method="post">
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= set_value('email') ?>">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="row mb-3 align-items-center">
            <div class="col-auto ">
                <label for="type">User Type:</label>
            </div>
            <div class="col">
                <select name="type" class="form-select" id="type">
                    <option value='customer' <?= set_select('type', 'customer', true) ?>>Customer</option>
                    <option value="agency" <?= set_select('type', 'agency') ?>>Agency</option>
                </select>
            </div>
        </div>

        <?php if(isset($validation)): ?>
            <div class="text-danger">
                <?= $validation->listErrors() ?>
            </div>
            <?php endif ?>


        <div class="row justify-content-center">
            <div class="col-3">
                <button type="submit" class="btn btn-primary ">Login</button>
            </div>
    </form>
</div>

<?= $this->endSection() ?>