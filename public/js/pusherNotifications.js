var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

var pusher = new Pusher('45b5fc3503134ee73d61', {
    encrypted: true
});
// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('animal');


// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\UserRegister', function (data) {
	console.log(11);
    var existingNotifications = notifications.html();
    var newNotificationHtml = `<a href="`+data.usrename+`">
    <div class="media-body"><h6 class="media-heading text-right">` +
     data.usrename + `</h6> <p class="notification-text font-small-3 text-muted text-right">` 

   + data.usrename + `</p><small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">` + data.usrename + `</p> </small></div></div></a>`;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});
