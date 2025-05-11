<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed to manage users
--------------------------------------->

<!-- Title -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
  <div class="container-fluid text-white h-100">
    <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
      <div class="col pt-4 pb-4">
        <h1 class="display-3"><strong>Manage Users</strong></h1>
      </div>
    </div>
  </div>
</div>
<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
  <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!-- End Header -->  

<!-- Search Bar -->
<div class="container text-center" data-aos="fade-up">
  <h1>Search for a user</h1>
  <form class="form-inline my-4 justify-content-center" method="get">
    <input type="text" name="search" class="form-control rounded-pill" style="width: 50%;" placeholder="Search users...">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit" style="margin-left: 10px;">Search</button>
      <a class="btn btn-primary" href="<?= base_url('manageUsers/addedit');?>" style="margin-left: 20px;">Add User</a>
    </div>
  </form>
</div>

<!-- Flash Messages -->
<?php if (session()->has('success')): ?>
  <div class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<?php if (session()->has('error')): ?>
  <div class="alert alert-danger">
    <?= session()->getFlashdata('error') ?>
  </div>
<?php endif; ?>

<!-- Users -->
<main>
  <table class="table table-striped table-bordered" data-aos="fade-up">
    <thead>
      <tr>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr class="text-center">
          <td><?= esc($user['name']) ?></td>
          <td><?= esc($user['email']) ?></td>
          <td><?= esc($user['phone']) ?></td>
          <td><?= esc($user['status']) ?></td>
          <td>
            <a href="<?= base_url('user/'.$user['user_id']); ?>" class="btn btn-primary btn-sm" style="margin: 15px;">
              View Information <i class="glyphicon glyphicon-info-sign"></i>
            </a>
            <a href="<?= base_url('manageUsers/addedit/'.$user['user_id']); ?>" class="btn btn-warning btn-sm" style="margin: 15px;">
              Edit <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="<?= base_url('manageUsers/delete/'.$user['user_id']); ?>" class="btn btn-danger btn-sm" style="margin: 15px;" onclick="return confirm('Are you sure you want to delete this user?')">
              Delete <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>

<?= $this->endSection() ?>