<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed to manage the menu items
--------------------------------------->

<!-- Header -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
    <div class="container-fluid text-white h-100">
        <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
            <div class="col pt-4 pb-4">
                <h1 class="display-3"><strong>Manage Menu</strong></h1>
            </div>
        </div>
    </div>
</div>

<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!-- End Header -->

<!-- Flash messages -->
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
<!-- End Flash messages -->

<!-- Display menu items -->
<section class="pt-5 pb-5" data-aos="fade-down">
    <div class="container">
        <div class="row gap-y">
            <?php foreach ($menu as $menuItem): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card" style="max-height: 500px; overflow-y: auto;">
                        <img class="card-img-top" src="<?= $menuItem['image'] ?>" alt="<?= $menuItem['name'] ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-dark"><?= $menuItem['name'] ?></h5>
                            <div class="mt-auto">
                                <p class="card-text text-muted mb-0"><?= $menuItem['summary'] ?></p>
                                <p class="card-text text-muted mb-0">Category: <?= $menuItem['category'] ?></p>
                                <p class="card-text text-muted mb-0">Price: $<?= $menuItem['price'] ?></p>
                            </div>
                            <div class="mt-3">
                                <a href="<?= base_url('showmenu/' . $menuItem['menu_id']) ?>" class="btn btn-primary btn-block">Edit</a>
                                <a href="<?= base_url('deleteMenuItem/' . $menuItem['menu_id']) ?>" class="btn btn-danger btn-block">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Add a new dish -->
<div class="container pt-5 pb-5" data-aos="fade-up" style="background-color:white;">
    <div class="text-center pt-3 pb-4">
        <h2>Add a New Dish</h2>
        <p class="text-muted">Enter the details of the new dish below</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <form action="<?= base_url('showmenu') ?>" method="post">
                    <div class="form-group">
                        <label for="dishname">Dish Name</label>
                        <input type="text" class="form-control" id="dishname" name="name" value="<?= old('name') ?>" placeholder="Enter the name of the dish">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option value="Main Course" <?= (old('category') === 'Main Course') ? 'selected' : '' ?>>Main Course</option>
                            <option value="Appetizer" <?= (old('category') === 'Appetizer') ? 'selected' : '' ?>>Appetizer</option>
                            <option value="Dessert" <?= (old('category') === 'Dessert') ? 'selected' : '' ?>>Dessert</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?= old('price') ?>" placeholder="Enter the price of the dish">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="summary" rows="3" placeholder="Enter a description of the dish"><?= old('summary') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image URL</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="Enter the URL of the dish image">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Dish</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>