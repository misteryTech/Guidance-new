     
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
                  <span class="text-secondary text-small">Administrator</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item <?= $current_page =='admin-profile.php' ? 'active' : ''?>">
              <a class="nav-link" href="admin-profile.php">
                <span class="menu-title">Profile</span>
                <i class="fa fa-user-circle-o menu-icon"></i>
              </a>
            </li>


            <li class="nav-item <?= $current_page =='index.php' ? 'active' : ''?>">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>



            

         <!-- Administator   dashboard-->
         <li class="nav-item <?  $current_page =='administrator-page.php' ? 'active' : '' ?>">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-administrator" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Administrator</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-user-circle-o menu-icon"></i>
              </a>
              <div class="collapse" id="ui-administrator">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="administrator-registration.php">Registration</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="administrator-list.php">List of Administrator</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="archive-list.php">Archive List</a>
                  </li>
               

               
                </ul>
              </div>
            </li>




         <!-- Counselor   dashboard-->
            <li class="nav-item <?  $current_page =='counselor-page.php' ? 'active' : '' ?>">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-counselor" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Counselor</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-user-md menu-icon"></i>
              </a>
              <div class="collapse" id="ui-counselor">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="counselor-page.php">Registration</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="counselor-list.php">List of Counselor</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="counselor-archive-list.php">Archive List</a>
                  </li>
               

                  <li class="nav-item">
                    <a class="nav-link" href="schedule-counselor.php">Counselor Booked</a>
                  </li>
                </ul>
              </div>
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
                    <a class="nav-link" href="patient-page.php">Registration</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="patient-list.php">List of Student</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="patient-archive-list.php">Archive List</a>
                  </li>


                </ul>
              </div>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#pds" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">PDS Print</span>
                <i class="mdi mdi-notebook menu-icon"></i>
              </a>
              <div class="collapse" id="pds">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pds-registration">pds-page.php</a>
                  </li>
                </ul>
              </div>
            </li> -->

<!-- 
            <li class="nav-item <?php $current_page == 'panel-page.php' ? 'active' : '' ?>">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-panel" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Panel</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-gears menu-icon"></i>
              </a>
              <div class="collapse" id="ui-panel">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">Section</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/dropdowns.html">Course</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/typography.html">Counselor Skills</a>
                  </li>
                </ul>
              </div>
            </li> -->





            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">List of Incident Report</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="incident-list.php">Incident List</a>
                  </li>
                </ul>
              </div>
            </li>
       
          
          </ul>
        </nav>