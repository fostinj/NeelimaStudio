<?php
session_start();
include 'connect.php';
if ($_SESSION['adminLogin'] != 'active')
{
    header('location:./index.php');
}

include 'adminsidebar.php';

?>

<section id="content">
  <div class="container c-boxed">
    <header class="page-header">
      <h3>Calendar</h3>
    </header>
    <div id="calendar"></div>
    
    <!-- Add event -->
    <div class="modal fade" id="addNew-event" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add an Event</h4>
          </div>
          <div class="modal-body">
            <form class="addEvent" action="addeventaction.php">
              <div class="form-group">
                <label for="eventName">Event Name</label>
                <div class="fg-line">
                  <input type="text" class="input-sm form-control" name="event" id="eventName" placeholder="Event Name">
                </div>
              </div>
              <div class="form-group">
                <label for="eventName">Tag Color</label>
                <div class="event-tag"> <span data-tag="bg-teal" class="bg-teal selected"></span> <span data-tag="bg-red" class="bg-red"></span> <span data-tag="bg-pink" class="bg-pink"></span> <span data-tag="bg-blue" class="bg-blue"></span> <span data-tag="bg-lime" class="bg-lime"></span> <span data-tag="bg-green" class="bg-green"></span> <span data-tag="bg-cyan" class="bg-cyan"></span> <span data-tag="bg-orange" class="bg-orange"></span> <span data-tag="bg-purple" class="bg-purple"></span> <span data-tag="bg-gray" class="bg-gray"></span> <span data-tag="bg-black" class="bg-black"></span> </div>
              </div>
              <input type="hidden" id="getStart" />
              <input type="hidden" id="getEnd" />
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" id="addEvent">Add Event</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer id="footer"> Copyright © 2019 Practo
  <ul class="f-menu">
    <li><a href="#">Home</a></li>
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Reports</a></li>
    <li><a href="#">Support</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</footer>

<!-- Javascript Libraries --> 
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="js/bootstrap-growl.min.js"></script> 
<script src="js/moment.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/functions.js"></script> 
<script src="js/demo.js"></script> 
<script>
            jQuery(document).ready(function() {
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();

                var cId = jQuery('#calendar'); //Change the name if you want. I'm also using thsi add button for more actions

                //Generate the Calendar
                cId.fullCalendar({
                    header: {
                        right: '',
                        center: 'prev, title, next',
                        left: ''
                    },

                    theme: true, //Do not remove this as it ruin the design
                    selectable: true,
                    selectHelper: true,
                    editable: true,

                    //Add Events
                    // events: [
                    //     {
                    //         title: 'Hangout with friends',
                    //         start: new Date(y, m, 1),
                    //         allDay: true,
                    //         className: 'bg-cyan'
                    //     },
                    //     {
                    //         title: 'Meeting with client',
                    //         start: new Date(y, m, 10),
                    //         allDay: true,
                    //         className: 'bg-orange'
                    //     },
                    //     {
                    //         title: 'Repeat Event',
                    //         start: new Date(y, m, 18),
                    //         allDay: true,
                    //         className: 'bg-amber'
                    //     },
                    //     {
                    //         title: 'Semester Exam',
                    //         start: new Date(y, m, 20),
                    //         allDay: true,
                    //         className: 'bg-green'
                    //     },
                    //     {
                    //         title: 'Soccor match',
                    //         start: new Date(y, m, 5),
                    //         allDay: true,
                    //         className: 'bg-lightblue'
                    //     },
                    //     {
                    //         title: 'Coffee time',
                    //         start: new Date(y, m, 21),
                    //         allDay: true,
                    //         className: 'bg-orange'
                    //     },
                    //     {
                    //         title: 'Job Interview',
                    //         start: new Date(y, m, 5),
                    //         allDay: true,
                    //         className: 'bg-amber'
                    //     },
                    //     {
                    //         title: 'IT Meeting',
                    //         start: new Date(y, m, 5),
                    //         allDay: true,
                    //         className: 'bg-green'
                    //     },
                    //     {
                    //         title: 'Brunch at Beach',
                    //         start: new Date(y, m, 1),
                    //         allDay: true,
                    //         className: 'bg-lightblue'
                    //     },
                    //     {
                    //         title: 'Live TV Show',
                    //         start: new Date(y, m, 15),
                    //         allDay: true,
                    //         className: 'bg-cyan'
                    //     },
                    //     {
                    //         title: 'Software Conference',
                    //         start: new Date(y, m, 25),
                    //         allDay: true,
                    //         className: 'bg-lightblue'
                    //     },
                    //     {
                    //         title: 'Coffee time',
                    //         start: new Date(y, m, 30),
                    //         allDay: true,
                    //         className: 'bg-orange'
                    //     },
                    //     {
                    //         title: 'Job Interview',
                    //         start: new Date(y, m, 30),
                    //         allDay: true,
                    //         className: 'bg-green'
                    //     },
                    // ],
                     
                    //On Day Select
                    select: function(start, end, allDay) {
                        jQuery('#addNew-event').modal('show');   
                        jQuery('#addNew-event input:text').val('');
                        jQuery('#getStart').val(start);
                        jQuery('#getEnd').val(end);
                    }
                });

                //Create and ddd Action button with dropdown in Calendar header. 
                var actionMenu = '<ul class="actions actions-alt" id="fc-actions">' +
                                    '<li class="dropdown">' +
                                        '<a href="" data-toggle="dropdown"><i class="jtv jtv-more-vert"></i></a>' +
                                        '<ul class="dropdown-menu">' +
                                            '<li class="active">' +
                                                '<a data-view="month" href="">Month View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="basicWeek" href="">Week View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="agendaWeek" href="">Agenda Week View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="basicDay" href="">Day View</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="agendaDay" href="">Agenda Day View</a>' +
                                            '</li>' +
                                        '</ul>' +
                                    '</div>' +
                                '</li>';


                cId.find('.fc-toolbar').append(actionMenu);
                
                //Event Tag Selector
                (function(){
                    jQuery('body').on('click', '.event-tag > span', function(){
                       jQuery('.event-tag > span').removeClass('selected');
                        jQuery(this).addClass('selected');
                    });
                })();
            
                //Add new Event
                jQuery('body').on('click', '#addEvent', function(){
                    var eventName = jQuery('#eventName').val();
                    var tagColor = jQuery('.event-tag > span.selected').attr('data-tag');
                        
                    if (eventName != '') {
                        //Render Event
                        jQuery('#calendar').fullCalendar('renderEvent',{
                            title: eventName,
                            start: jQuery('#getStart').val(),
                            end:  jQuery('#getEnd').val(),
                            allDay: true,
                            className: tagColor
                            
                        },true ); //Stick the event
                        
                        jQuery('#addNew-event form')[0].reset()
                        jQuery('#addNew-event').modal('hide');
                    }
                    
                    else {
                        jQuery('#eventName').closest('.form-group').addClass('has-error');
                    }
                });   

                //Calendar views
                jQuery('body').on('click', '#fc-actions [data-view]', function(e){
                    e.preventDefault();
                    var dataView = jQuery(this).attr('data-view');
                    
                    jQuery('#fc-actions li').removeClass('active');
                    jQuery(this).parent().addClass('active');
                    cId.fullCalendar('changeView', dataView);  
                });
            });                        
        </script>
</body>

<!--calendar.html 17:59:36 GMT -->
</html>