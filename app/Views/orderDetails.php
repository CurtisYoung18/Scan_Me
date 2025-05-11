<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed to display order details
--------------------------------------->

<!-- Header -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
    <div class="container-fluid text-white h-100">
        <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
            <div class="col pt-4 pb-4">
                <h1 class="display-3"><strong>Order Details</strong></h1>
            </div>
        </div>
    </div>
</div>
<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!--- END HEADER -->

<!-- ORDER DETAILS -->
<div class="container pt-5 pb-5 mb-5" data-aos="fade-up"> 
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div id="docsarea" class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold text-primary">Order Details For Order <?= $order['order_id']?></h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Menu Item</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order['order_items'] as $orderItem):?>
                                <tr>
                                    <td><?= $orderItem['menu_name']?></td>
                                    <td><?= number_format($orderItem['menu_price'], 2)?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-muted">Order Status: <strong><?= $order['order_status']?> </strong></p>
                        </div>
                        <div class="col-md-12">
                            <p class="text-muted">Table Number: <strong><?= $order['table_number']?> </strong></p>
                        </div>
                    </div>
                    <a href="<?= base_url('order')?>" class="btn btn-primary btn-block">Back to Manage Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ORDER DETAILS -->

<?= $this->endSection() ?>