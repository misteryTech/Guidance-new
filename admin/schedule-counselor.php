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

          <h2>Appointments Calendar</h2>
                <div id="calendar"></div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
     <?php

        include("footer.php");
      ?>


<!-- ✅ Initialize FullCalendar Correctly -->
<script>



document.addEventListener("DOMContentLoaded", function () {
        // Debugging: Check if FullCalendar is loaded
        if (typeof FullCalendar === "undefined") {
            console.error("🚨 FullCalendar is NOT LOADED!");
            return;
        } else {
            console.log("✅ FullCalendar is loaded successfully.");
        }

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: 'process/fetch_appointment.php', // Fetch events dynamically
            locale: 'en', // Optional: Set language
            eventColor: '#007bff' // Optional: Change event color
        });

        calendar.render();
    });


</script>