<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is the default home page
--------------------------------------->

<!-- The title of the page -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
    <div class="container-fluid text-white h-100">
        <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
            <div class="col pt-4 pb-4">
                <h1 class="display-3">Scan your <strong>Menu</strong> & Place your <strong>Order</strong></h1>
                <h5 class="font-weight-light mb-4">With our easy-to-use<strong> Menu Scanner</strong> & <strong>Ordering System</strong></h5>
                <a href="#" class="btn btn-lg btn-outline-white btn-round">Learn more</a>
            </div>
            <div class="col align-self-bottom align-items-right text-right h-max-380 h-xl-560 position-relative z-index-1">
                <img src="<?= base_url('img/scan_order.webp'); ?>" class="rounded img-fluid">
            </div>
        </div>
    </div>
</div>

<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
    <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>

<!-- The features of the app -->
<div class="container pt-5 pb-5 mt-4" data-aos="fade-up">
    <div class="row gap-y">
        <div class="col-md-6 col-xl-4">
            <div class="media">
                <div class="iconbox iconmedium rounded-circle text-primary mr-4">
                    <i class="fas fa-qrcode"></i>
                </div>
                <div class="media-body">
                    <h5>Generate Table QR Codes</h5>
                    <p class="text-muted">
                        Our software can generate QR codes for your tables, making it easy for customers to order by scanning the code.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="media">
                <div class="iconbox iconmedium rounded-circle text-success mr-4">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="media-body">
                    <h5>Customer Ordering</h5>
                    <p class="text-muted">
                        Customers can place orders by scanning the QR code on the table, making the process convenient and quick.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="media">
                <div class="iconbox iconmedium rounded-circle text-warning mr-4">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="media-body">
                    <h5>Restaurant Manager Management</h5>
                    <p class="text-muted">
                        Restaurant managers can manage staff accounts, including adding, deleting, and modifying staff information.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row gap-y">
        <div class="col-md-6 col-xl-4">
            <div class="media">
                <div class="iconbox iconmedium rounded-circle text-info mr-4">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="media-body">
                    <h5>Staff Menu Editing</h5>
                    <p class="text-muted">
                        Staff can edit the menu, including adding new dishes, modifying dish information, and deleting dishes.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="media">
                <div class="iconbox iconmedium rounded-circle text-danger mr-4">
                    <i class="fas fa-tv"></i>
                </div>
                <div class="media-body">
                    <h5>Real-Time Order Display</h5>
                    <p class="text-muted">
                        Our software provides a real-time display of orders, helping staff to manage orders efficiently.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="media">
                <div class="iconbox iconmedium rounded-circle text-secondary mr-4">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="media-body">
                    <h5>Order Management</h5>
                    <p class="text-muted">
                        Our software allows for efficient order management, ensuring smooth operation of your restaurant.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of the features -->

<!--------------------------------------
CTA
--------------------------------------->
<div class="container pt-4 pb-5 mb-5" data-aos="fade-up">
    <div class="pb-4 text-center">
        <h2>Ready? <strong><span class="text-secondary">Start</span> your free trial!</strong></h2>
    </div>
    <form class="row justify-content-center">
        <div class="col-md-3">
            <input type="text" class="form-control input-round w-100 form-control-lg" placeholder="First name*">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control input-round w-100 form-control-lg" placeholder="E-mail address*">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-info btn-round btn-lg w-100">Start Free</button>
        </div>
    </form>
</div>
<!-- End CTA -->

<?= $this->endSection() ?>
