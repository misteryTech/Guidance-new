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
<!-- ✅ Load jQuery FIRST -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ✅ Load FullCalendar CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.css" rel="stylesheet" />

<!-- ✅ Load FullCalendar JS (Ensure Core + DayGrid Plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/locales-all.min.js"></script>

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