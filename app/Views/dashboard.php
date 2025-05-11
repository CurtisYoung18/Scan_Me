<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-------------------------------------
This page is designed for admin users to manage their store
--------------------------------------->
<!-- Title -->
<div class="jumbotron jumbotron-lg jumbotron-fluid mb-0 pb-3 bg-primary position-relative">
  <div class="container-fluid text-white h-100">
    <div class="d-lg-flex align-items-center justify-content-between text-center pl-lg-5">
      <div class="col pt-4 pb-4">
        <h1 class="display-3"><strong>Manage your store</strong></h1>
      </div>
      <div class="col align-self-bottom align-items-right text-right h-max-380 position-relative z-index-1">
        <img src="https://images.unsplash.com/photo-1472851294608-062f824d29cc?q=80&w=2304&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded img-fluid">
      </div>
    </div>
  </div>
</div>
<svg style="-webkit-transform:rotate(-180deg); -moz-transform:rotate(-180deg); -o-transform:rotate(-180deg); transform:rotate(-180deg); margin-top: -1px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 1440 126" style="enable-background:new 0 0 1440 126;" xml:space="preserve">
  <path class="bg-primary" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
</svg>

<!--------------------------------------
DASHBOARD FEATURES
--------------------------------------->
<div class="container pt-5 pb-5 mt-4" data-aos="fade-up">
  <div class="row gap-y">
    <div class="col-md-6 col-xl-4">
      <div class="media">
        <div class="iconbox iconmedium rounded-circle text-info mr-4">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="media-body">
          <h5>User Management</h5>
          <p class="text-muted">
            Manage all your orders in one place, track their status, and process them efficiently.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="media">
        <div class="iconbox iconmedium rounded-circle text-purple mr-4">
          <i class="fas fa-utensils"></i>
        </div>
        <div class="media-body">
          <h5>Menu Management</h5>
          <p class="text-muted">
            Update your menu in real-time, add new dishes, set prices, and manage availability.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">
      <div class="media">
        <div class="iconbox iconmedium rounded-circle text-info mr-4">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="media-body">
          <h5>Reports and Analytics</h5>
          <p class="text-muted">
            Get insights into your sales, understand your customers better, and grow your business.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!--------------------------------------
PHOTO
--------------------------------------->
<section class="pt-3 pb-4" data-aos="zoom-in">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <img class="d-block m-auto shadow" src="https://images.unsplash.com/photo-1568031813264-d394c5d474b9?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8TWVudXxlbnwwfHwwfHx8MA%3D%3D" alt="">
      </div>
    </div>
  </div>
</section>
<!-- End PHOTO -->

<!--------------------------------------
NAVIGATION LINKS
--------------------------------------->
<div class="container pt-5 pb-4" data-aos="fade-up">
  <div class="row justify-content-center">
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-header" style="background-color: #87CEEB; background-image: linear-gradient(to bottom, #87CEEB, #45B3FA);">
          <a href=<?= base_url('manageUsers');?> class="btn btn-block btn-lg hover-effect">
            <h2 class="my-0 font-weight-bold mb-3 text-center">
              <i class="fas fa-home" style="color: black"></i>
              <span style="color: black;">User</span>
            </h2>
          </a>
          <p class="text-black text-center mb-0">Manage your users</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-header" style="background-color: #FFA07A; background-image: linear-gradient(to bottom, #FFA07A, #FFC107);">
          <a href=<?= base_url('order');?> class="btn btn-block btn-lg hover-effect">
            <h2 class="my-0 font-weight-bold mb-3 text-center">
              <i class="fas fa-shopping-cart" style="color: black"></i>
              <span style="color: black;">Order</span>
            </h2>
          </a>
          <p class="text-black text-center mb-0">Manage your orders</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-header" style="background-color: #455A64; background-image: linear-gradient(to bottom, #2196F3, #9E9E9E);">
          <a href=<?= base_url('showmenu');?> class="btn btn-block btn-lg hover-effect">
            <h2 class="my-0 font-weight-bold mb-3 text-center">
              <i class="fas fa-utensils" style="color: black"></i>
              <span style="color: black;">Menu</span>
            </h2>
          </a>
          <p class="text-black text-center mb-0">Manage your menu</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------
END OF NAVIGATION LINKS
--------------------------------------->


<div class="container pt-5 pb-5" data-aos="fade-up" style="background-color:white;">
  <div class="text-center pt-3 pb-4">
    <h2>User Review</h2>
    <p class="text-muted">
      Hear from our satisfied customers
    </p>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text">"This is the best service I have ever used. Highly recommended!"</p>
        <h5 class="card-title">- John Doe</h5>
      </div>
      <div class="card-body">
        <p class="card-text">"Amazing product. It has helped me a lot with my management."</p>
        <h5 class="card-title">- Jane Smith</h5>
      </div>

      <!-- Add more testimonials here -->
    </div>
  </div>
</div>


<?= $this->endSection() ?>