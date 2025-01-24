<div class="row p-0 m-0 proBanner" id="proBanner">
  <div class="col-md-12 p-0 m-0">
    <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
      <div class="ps-lg-3">
        <div class="d-flex align-items-center justify-content-between">
          <p class="mb-0 font-weight-medium me-3 buy-now-text">
            <?php
              // Set timezone to Philippines
              date_default_timezone_set('Asia/Manila');
              $currentMonth = date('F'); // Get the current month
              $hour = date('H'); // Get the current hour
              $greeting = "Good morning";

              if ($hour >= 12 && $hour < 18) {
                $greeting = "Good afternoon";
              } elseif ($hour >= 18) {
                $greeting = "Good evening";
              }

              echo "$greeting! Welcome to our platform. It's $currentMonth.";
            ?>
          </p>
          <a href="#" target="_blank" class="btn me-2 buy-now-btn border-0">Enjoy</a>
        </div>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <a href="#"><i class="mdi mdi-home me-3 text-white"></i></a>
        <button id="bannerClose" class="btn border-0 p-0">
          <i class="mdi mdi-close text-white mr-0"></i>
        </button>
      </div>
    </div>
  </div>
</div>
