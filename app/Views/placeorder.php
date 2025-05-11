<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed to place an order from scanning the QR code by users
--------------------------------------->

<!-- Header -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
    <div class="container-fluid text-white h-100">
        <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
            <div class="col pt-4 pb-4">
                <h1 class="display-3"><strong>Place Your Order For Table <?= $tableNumber ?></strong></h1>
            </div>
            <div class="col align-self-bottom align-items-right text-right h-max-380 position-relative z-index-1">
                <img src="https://images.unsplash.com/photo-1529003600303-bd51f39627fb?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8b3JkZXJzfGVufDB8fDB8fHww" class="rounded img-fluid">
            </div>
        </div>
    </div>
</div>

<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!-- End Header -->

<!-- Display menu items -->
<form method="post" action="<?= base_url('placeorder/' . $tableNumber) ?>">
    <div style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php foreach ($menuItems as $item) : ?>
            <div style="margin: 10px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: calc(50% - 20px); transition: all 0.3s ease; flex: 0 0 calc(50% - 20px);">
                <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px 10px 0 0;">
                <div style="padding: 10px; text-align: center;">
                    <h5 style="font-weight: bold; margin-bottom: 5px;"><?= $item['name'] ?></h5>
                    <p style="font-size: 16px; color: #666;">$<?= $item['price'] ?></p>
                    <input type="checkbox" name="menu_items[]" value="<?= $item['menu_id'] ?>" style="margin: 10px;">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" style="background-color: #4CAF50; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; display: block; margin-left: auto; margin-right: auto;">Submit Order</button>
</form>

<!--Style -->
<style>
    div[style*="width: calc(50% - 20px)"] {
        cursor: pointer;
    }
    div[style*="width: calc(50% - 20px)"]:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }
</style>

<?= $this->endSection() ?>