    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2017 &copy; FEU Institute of Technology &nbsp;|&nbsp; Activity Proposal Monitoring System
        </div>
        <div class="scroll-to-top">
            <button class="btn dark btn-lg"><span class="icon-arrow-up"></span></button>
        </div>
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo base_url() . 'js/jquery.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/bootstrap.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/js.cookie.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/jquery.slimscroll.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/jquery.blockui.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/bootstrap-switch.min.js'?>" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url() . 'js/moment.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/fullcalendar.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/jquery-ui.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/toastr.min.js'?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo base_url() . 'js/app.min.js'?>" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!--<script src="<?php echo base_url() . 'js/calendar.min.js'?>" type="text/javascript"></script>-->
    <script src="<?php echo base_url() . 'js/lock.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/bootstrap-fileinput.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/pnotify.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/ui-toastr.min.js'?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo base_url() . 'js/layout.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/demo.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/quick-sidebar.min.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'js/quick-nav.min.js'?>" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <!-- DROPZONE -->
    <script src="<?php echo base_url() . 'js/dropzone.js'?>"></script>\
    <script>
        $(document).ready(function()
        {
            $('#clickmewow').click(function()
            {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>
    <script>
        $(document).ready(function() {

            $.ajax({
                url: '../process.php',
                type: 'POST',
                data: 'type=fetch',
                async: false,
                success: function(response){
                    json_events = response;
                    console.log(json_events);
                }
            });

            /* initialize the calendar
            -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: false,
                events: JSON.parse(json_events),
                eventClick: function(event, jsEvent, view) {
                    
                    // $.ajax({
                    //     url: 'process.php',
                    //     data: 'type=changetitle&title='+title+'&eventid='+event.id,
                    //     type: 'POST',
                    //     dataType: 'json',
                    //     success: function(response){	
                    //         if(response.status == 'success')			    			
                    //             $('#calendar').fullCalendar('updateEvent',event);
                    //     },
                    //     error: function(e){
                    //         alert('Error processing your request: '+e.responseText);
                    //     }
                    // });
                    
                    // alert(event.title);
                    // document.getElementById('modal-title').innerHTML     = event.title + " details";
                    document.getElementById('event-organizer').innerHTML = event.org;
                    document.getElementById('event-title').innerHTML     = event.title;
                    document.getElementById('event-startdate').innerHTML     = event.start;
                    document.getElementById('event-enddate').innerHTML     = event.end;
                    $('#event_details').modal('show');
                },
            });


        });
    </script>
</body>
</html>