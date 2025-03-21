<?php
    include("header.php");
?>
    <div class="container-scroller">


    <?php

include("top-navigation.php");

?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    <?php
      include("sidebar.php");
    ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          
                                 <div class="row">
                                 <div class="col-lg-12 grid-margin stretch-card">
                                     <div class="card">
                                       <div class="card-body">
                                         <h4 class="card-title">Monthly Appointments</h4>
                                         <canvas id="barChart" style="height:230px"></canvas>
                                       </div>
                                     </div>
                                   </div>

                                      
                
<!-- 
                                   <div class="col-lg-6 grid-margin stretch-card">
                                     <div class="card">
                                       <div class="card-body">
                                         <h4 class="card-title">Monthly Student Registration</h4>
                                         <canvas id="studenReg" style="height:230px"></canvas>
                                       </div>
                                     </div>
                                   </div>

                                 </div>

                                 <div class="row">
                                 <div class="col-lg-6 grid-margin stretch-card">
                                     <div class="card">
                                       <div class="card-body">
                                         <h4 class="card-title">Monthly Appointments</h4>
                                         <canvas id="" style="height:230px"></canvas>
                                       </div>
                                     </div>
                                   </div>

                                      
                

                                  <div class="col-lg-6 grid-margin stretch-card">
                                      <div class="card">
                                        <div class="card-body">
                                          <h4 class="card-title">Doughnut chart</h4>
                                          <div class="doughnutjs-wrapper d-flex justify-content-center">
                                            <canvas id="doughnutChart"></canvas>
                                          </div>
                                        </div>
                                      </div>
                                 </div> -->



             </div>



          </div>


          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
     <?php

        include("footer.php");
      ?>