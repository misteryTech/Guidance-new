     
     <?php
            $current_page  = basename($_SERVER['PHP_SELF']);
     ?>
     <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="photos/LOGO.png" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $fullname; ?> </span>
                  <span class="text-secondary text-small">Counselor</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
       

            <li class="nav-item <?= $current_page =='index.php' ? 'active' : ''?>">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>






            <li class="nav-item <?php $current_page == 'patient-page.php' ? 'active' : '' ?>">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-patient" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Student</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-user menu-icon"></i>
              </a>
              <div class="collapse" id="ui-patient">
                <ul class="nav flex-column sub-menu">
               
                  <li class="nav-item">
                    <a class="nav-link" href="patient-list.php">List of Student</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="patient-archive-list.php">Archive List</a>
                  </li>


                  <li class="nav-item">
                    <a class="nav-link" href="student-session-list.php">Session List</a>
                  </li>



                </ul>
              </div>
            </li>



            
      



            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#pds" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Student PDS Information</span>
                <i class="mdi mdi-notebook menu-icon"></i>
              </a>
              <div class="collapse" id="pds">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="personal-data-list.php">Information Data List</a>
                  </li>
                </ul>
              </div>
            </li>




            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Report Incident </span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="report-incident-page.php">Report Incident</a>
                  </li>
                </ul>
              </div>
            </li>
      
          
          </ul>
        </nav>