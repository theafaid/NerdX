// Gameforest notification plugin by yakuzi
// Author: https://yakuthemes.com
// Version: 1.0.1

(function($) {
	"use strict";

  $.fn.notification = function(notify) {

    $(this).click(function(e) {
      e.preventDefault();

      var id = 1 + Math.floor(Math.random() * 99);
      var title = $(this).data("title");
      var alert;
      var align;

      if ($(this).data("notification")) {
        alert = $(this).data("notification");
      } else {
        alert = 'info';
      }

      if ($(this).data("alignment")) {
        align = 'notification-' + $(this).data("alignment");
      } else {
        align = '';
      }

      $('body').append('<div id="notification-' + id + '" class="notification ' + align + ' animated fadeInDown fast"><div class="alert alert-' + alert + '">' + title + '</div></div>');

      setTimeout(function(){
    		$('body').find('#notification-' + id).removeClass('fadeInDown').addClass('fadeOutUp');
    	}, 3000);

    	setTimeout(function(){
    		$('body').find('#notification-' + id).remove();
    	}, 4000);
    });

    return this;
  };
})(window.jQuery);
