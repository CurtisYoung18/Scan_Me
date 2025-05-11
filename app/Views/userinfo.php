<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed to display user information
--------------------------------------->

<!-- Header -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
  <div class="container-fluid text-white h-100">
    <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
      <div class="col pt-4 pb-4">
        <h1 class="display-3"><strong>User Information</strong></h1>
      </div>
    </div>
  </div>
</div>
<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
  <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!-- End Header -->   

<!-- User Information -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center"><i class="fas fa-user"></i>   <?= esc($user['name'])?> </h1>
          <div class="mb-4"></div> <!-- added padding -->
          <hr>
          <div class="mb-4"></div> <!-- added padding -->
          <h2 class="text-center">Personal Information </h2>
          <p class="text-center">Email  <i class="fas fa-envelope"></i> <?= esc($user['email'])?> </p>
          <p class="text-center">Phone  <i class="fas fa-phone"></i> <?= esc($user['phone'])?> </p>
          <div class="mb-4"></div> 

          <?php if ($address):?>
          <h2 class="text-center">Address </h2>
          <p class="text-center"><?= esc($address['address'])?>

          <?= esc($address['city'])?>, <?= esc($address['state'])?>

          <?= esc($address['postalCode'])?>, <?= esc($address['countryCode'])?></p>
          <div class="mb-4"></div> 
          <?php endif;?>

          <h2 class="text-center">Work Experience </h2>
          <table class="table table-striped">
            <tr><th>Company</th><th>Position</th><th>Period</th><th>Summary</th></tr>
            <?php foreach ($role as $role):?>
            <tr>
              <td><?= esc($role['name'])?> </td>
              <td><?= esc($role['position'])?></td>
              <td><?= esc($role['startDate'])?> - <?= esc($role['endDate'])?></td>
              <td><?= esc($role['summary'])?></td>
            </tr>
            <?php endforeach;?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End User Information -->

<?= $this->endSection() ?>