<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed to manage tables and generate QR codes for each table
--------------------------------------->

<!-- Title -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
    <div class="container-fluid text-white h-100">
        <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
            <div class="col pt-4 pb-4">
                <h1 class="display-3"><strong>Manage Your Tables</strong></h1>
            </div>
        </div>
    </div>
</div>
<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!-- End Header --> 

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

<!-- Manage the tables -->
<div class="container" data-aos="fade-up">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Table Number</th>
                        <th>Table Create Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tables as $table): ?>
                        <tr>
                            <td><?= $table['tableNumber'] ?></td>
                            <td><?= $table['createdAt'] ?></td>
                            <td>
                                <a href="/menuscan/deleteTable/<?= $table['table_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add some space -->
<div class="mb-5"></div>

<!-- QR Code Section -->
<div class="text-center pt-3 pb-4" data-aos="fade-up">
    <div class="text-center">
        <h1><strong>Choose</strong> A Table For Your QR Code</h1>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <form id="tableNumberForm" action="<?php echo site_url('qrcode'); ?>" method="post">
            <!-- add some space -->
            <div class="mb-5"></div>
            <label for="tableNumber">Table Number:</label>
            <input type="number" id="tableNumber" name="tableNumber" min="1">
            <button type="submit" class="btn btn-primary">Generate QR Code</button>
        </form>
        
        <!-- add some space -->
        <div class="mb-5"></div>
        
        <!-- php QR code generator -->
        <div id="qrCodeSection">
            <div class="text-center">
                <?php if (isset($qrcode)): ?>
                    <h1 class="text-center">Here Is Your Code For Table <?= $tableNumber ?></h1>
                    <img src="<?php echo $qrcode; ?>" alt='QR Code' width='200' height='200' id="qrCodeImage">
                <?php else: ?>
                    <!-- Display a message or a placeholder image here -->
                    <h2>No QR code generated yet</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Add a table -->
<div class="text-center pt-3 pb-4" data-aos="fade-up">
    <h2>Add a table</h2>
    <form class="mx-auto w-50" action="<?= base_url('addTable') ?>" method="post">
        <div class="form-group">
            <label for="tableNumber">Table Number</label>
            <input type="number" class="form-control" id="tableNumber" name="tableNumber" placeholder="Enter table number" required>
        </div>
        <div class="form-group">
            <label for="createdAt">Created At</label>
            <input type="datetime-local" class="form-control" id="createdAt" placeholder="Enter created at date and time" name="createdAt" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Table</button>
    </form>
</div>

<?= $this->endSection() ?>