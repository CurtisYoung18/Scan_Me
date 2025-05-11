<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed to edit menu
--------------------------------------->

<!-- Title -->
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

<!-- Edit Menu Item -->
<div class="container pt-5 pb-5" data-aos="fade-up" style="background-color:white;">
    <div class="text-center pt-3 pb-4">
        <h2>Edit Menu Item</h2>
        <p class="text-muted">
            Enter the updated details of the menu item below
        </p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <form action="<?= base_url('showmenu/'.(isset($menu) ? '/' . $menu['menu_id'] : '')) ?>" method="post">
                    <?= csrf_field()?>
                    <div class="form-group">
                        <label for="dishname">Dish Name</label>
                        <input type="text" class="form-control" id="dishname" name="name" value="<?= isset($menu['name'])? esc($menu['name']) : ''?>" placeholder="Enter the name of the dish">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option value="Main Course" <?= (isset($menu['category']) && $menu['category'] === 'Main Course')?'selected' : ''?>>Main Course</option>
                            <option value="Appetizer" <?= (isset($menu['category']) && $menu['category'] === 'Appetizer')?'selected' : ''?>>Appetizer</option>
                            <option value="Dessert" <?= (isset($menu['category']) && $menu['category'] === 'Dessert')?'selected' : ''?>>Dessert</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?= isset($menu['price'])? esc($menu['price']) : ''?>" placeholder="Enter the price of the dish">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="summary" rows="3" placeholder="Enter a description of the dish"><?= isset($menu['summary'])? esc($menu['summary']) : ''?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image URL</label>
                        <input type="text" class="form-control" id="image" name="image" value="<?= isset($menu['image'])? esc($menu['image']) : ''?>" placeholder="Enter the URL of the dish image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Menu Item</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>