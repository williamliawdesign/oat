// JavaScript Document

// remove the no_js class from older browsers
// that do not support the native 
// JavaScript .classList.remove()
// or classList.add() methods
$('html').removeClass('no_js');
$('html').addClass('js'); 

var $body = $('body');
var $mobileMenu = $('.mobile_menu');

$mobileMenu.click(function(){
	$body.toggleClass('show_menu');		
});

var $weeks = $('.week');
var weekNumber = window.location.hash.substring(1).replace('week_', '');
var $currentWeek = $('#week_' + weekNumber++);
var $nextWeek = $('#week_' + weekNumber);

$weeks.children('div').hide();
$currentWeek.children('div').show();
$currentWeek.children('h1').addClass('open');
$nextWeek.children('div').show();
$nextWeek.children('h1').addClass('open');

$weeks.children('h1').on('click', function() {
	$(this).toggleClass('open');
	$(this).next('div').slideToggle();
});