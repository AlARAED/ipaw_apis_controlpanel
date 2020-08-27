<head>
        <meta charset="utf-8" />
        <title>Ipaw</title>
        <link rel="icon" href="{{url('admin')}}/assets/layouts/layout2/img/ss.png">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #2 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('admin/')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('admin/')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('admin/')}}/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('admin/')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('admin/')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('admin/')}}/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{url('admin/')}}/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('admin/')}}/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('admin/')}}/assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('admin/')}}/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('admin/')}}/assets/layouts/layout2/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('admin/')}}/assets/layouts/layout2/css/themes/blue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('admin/')}}/assets/layouts/layout2/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        
</head>
      
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://js.pusher.com/3.1/pusher.min.js"></script>

    <script>


    

      //instantiate a Pusher object with our Credential's key
    var pusher = new Pusher("45b5fc3503134ee73d61", {
  cluster: "ap2"
});

      //Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('animal');

      channel.bind('App\\Events\\UserRegister', addMessage);

        channel.bind('App\\Events\\arrivequestion', newques);

      // channel.bind('App\\Events\\ChallengEvent', handleChallenge)

      

      function addMessage(data) {



        var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notifications = notificationsWrapper.find('li.scrollable-container');

      
        // set counter
        var pusher = new Pusher('45b5fc3503134ee73d61', {
            encrypted: true
        });

            var existingNotifications = notifications.html();

            var newNotificationHtml = ` <a  >
                                                    <span class="time">` + data.message + `</span>
                                                    <span class="details"> ` + data.username + `
                                                        <span class="label label-sm label-icon label-success">
                                                     
                                                            <i class="fa fa-plus"></i>
                                                </a>
                                            
                                         
                                     `;


 notifications.html(newNotificationHtml + existingNotifications);
   
    notificationsWrapper.show();
      }





      function newques(data) {

        console.log(data.message);
               var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
        var notificationsCountElem = notificationsToggle.find('i[data-count]');
        var notifications = notificationsWrapper.find('li.scrollable-container');

     
        var pusher = new Pusher('45b5fc3503134ee73d61', {
            encrypted: true
        });

            var existingNotifications = notifications.html();

            var newNotificationHtml = ` <a  >
                                                    <span class="time">` + data.message + `</span>
                                                  
                                                        <span class="label label-sm label-icon label-success">
                                                     
                                                            <i class="fa fa-plus"></i>
                                                </a>
                                            
                                         
                                     `;


 notifications.html(newNotificationHtml + existingNotifications);
  
    notificationsWrapper.show();
      }
    </script>

</head>