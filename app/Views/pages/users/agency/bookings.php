<?= $this->extend('layouts/agency') ?>

<?= $this->section('mainContent') ?>

<div class="container bg-light">
    <h2 class="text-center">Bookings</h2>
    <div class="row">
        <div class="col">
            <?php if(count($bookings)>0): ?>
        <table class="table table-bordered border-dark">
        <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Car Model</th>
      <th scope="col">Car Number</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Customer Email</th>
      <th scope="col">Start Date</th>
      <th scope="col">No of Days</th>
      <th scope="col">Rent</th>
    </tr>
  </thead>
  <tbody>

    <?php $i=1 ?>
<?php foreach($bookings as $booking): ?>
    <tr>
      <th scope="row"><?=$i++?></th>
      <td><?=ucwords($booking['model'])?></td>
      <td><?=$booking['number']?></td>
      <td><?=ucfirst($booking['fname'])?> <?=ucfirst($booking['lname'])?></td>
      <td><?=$booking['email']?></td>
      <td><?=$booking['from_date']?></td>
      <td><?=$booking['no_of_days']?></td>
      <td>&#8377;<?=$booking['rent']?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
        </table>
        <?php else: ?>
        <div class="d-flex position-fixed top-50 justify-content-center start-0" style="width: 100%;">
                <h2>No bookings found!!!</h2>
            </div>
    <?php endif ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>