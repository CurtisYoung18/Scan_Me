<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed to manage orders
--------------------------------------->

<!-- Header -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
    <div class="container-fluid text-white h-100">
        <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
            <div class="col pt-4 pb-4">
                <h1 class="display-3"><strong>Manage Orders</strong></h1>
            </div>
        </div>
    </div>
</div>
<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>
<!--- END HEADER -->

<!-- ORDERS -->
<div class="container pt-5 pb-5 mb-5" data-aos="fade-up">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div id="docsarea" class="font-weight-normal">
                <h2>Your Orders</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['order_id'] ?></td>
                                <td><?= $order['createdAt'] ?></td>
                                <td><?= $order['order_status'] ?></td>
                                <td>
                                    <?php
                                    $totalPrice = 0;
                                    foreach ($order['order_items'] as $orderItem) {
                                        $totalPrice += $orderItem['menu_price'];
                                    }
                                    ?>
                                    $<?= number_format($totalPrice, 2) ?>
                                </td>
                                <td>
                                    <?php if ($order['order_status'] !== 'done'): ?>
                                        <button class="btn btn-success btn-sm" onclick="location.href='<?= base_url('markOrderAsDone/' . $order['order_id']) ?>'">Mark as Done</button>
                                    <?php endif; ?>
                                    <button class="btn btn-primary btn-sm" onclick="location.href='<?= base_url('orderDetails/' . $order['order_id']) ?>'">View Details</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END ORDERS -->

<?= $this->endSection() ?>
