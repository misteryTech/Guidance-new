<?php
$current_page  = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar Navigation -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="photos/LOGO.png" alt="profile" />
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo $fullname; ?> </span>
                    <span class="text-secondary text-small">Administrator</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>

        <li class="nav-item <?= $current_page == 'admin-profile.php' ? 'active' : '' ?>">
            <a class="nav-link" href="admin-profile.php">
                <span class="menu-title">Profile</span>
                <i class="fa fa-user-circle-o menu-icon"></i>
            </a>
        </li>

        <li class="nav-item <?= $current_page == 'index.php' ? 'active' : '' ?>">
            <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <!-- Administrator Section -->
        <?php 
        $admin_active = in_array($current_page, ['administrator-page.php', 'archive-list.php']) ? 'active' : '';
        $admin_show = in_array($current_page, ['administrator-page.php', 'archive-list.php']) ? 'show' : '';
        ?>
        <li class="nav-item <?= $admin_active ?>">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-administrator" aria-expanded="<?= $admin_active ? 'true' : 'false' ?>" aria-controls="ui-administrator">
                <span class="menu-title">Administrator</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-user-circle-o menu-icon"></i>
            </a>
            <div class="collapse <?= $admin_show ?>" id="ui-administrator">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="administrator-registration.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="administrator-list.php">List of Administrator</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="archive-list.php">List of Archive</a>
                    </li>
                    
               
                </ul>
            </div>
        </li>

        <!-- Counselor Section -->
        <?php 
        $counselor_active = in_array($current_page, ['counselor-page.php', 'counselor-archive-list.php']) ? 'active' : '';
        $counselor_show = in_array($current_page, ['counselor-page.php', 'counselor-archive-list.php']) ? 'show' : '';
        ?>
        <li class="nav-item <?= $counselor_active ?>">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-counselor" aria-expanded="<?= $counselor_active ? 'true' : 'false' ?>" aria-controls="ui-counselor">
                <span class="menu-title">Counselor</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-user-md menu-icon"></i>
            </a>
            <div class="collapse <?= $counselor_show ?>" id="ui-counselor">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="counselor-page.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="counselor-list.php">List of Counselor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'counselor-archive-list.php' ? 'active' : '' ?>" href="counselor-archive-list.php">Archive List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="schedule-counselor.php">Counselor Booked</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Student Section -->
        <?php 
        $student_active = in_array($current_page, ['patient-page.php', 'patient-archive-list.php']) ? 'active' : '';
        $student_show = in_array($current_page, ['patient-page.php', 'patient-archive-list.php']) ? 'show' : '';
        ?>
        <li class="nav-item <?= $student_active ?>">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-patient" aria-expanded="<?= $student_active ? 'true' : 'false' ?>" aria-controls="ui-patient">
                <span class="menu-title">Student</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-user menu-icon"></i>
            </a>
            <div class="collapse <?= $student_show ?>" id="ui-patient">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="patient-page.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patient-list.php">List of Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'patient-archive-list.php' ? 'active' : '' ?>" href="patient-archive-list.php">Archive List</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Incident Report -->
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



        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Reports</span>
                <i class="mdi mdi-data menu-icon"></i>
       
                <i class="mdi mdi-chart-histogram"></i>

            </a>
            <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
