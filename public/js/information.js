$(document).ready(function() {
	$(".rs-desc a").click(function(event) {
    /* Act on the event */
    $(".shadow").show();
    $(".pay").show();
  });
  $("#go_back").click(function(event) {
    /* Act on the event */
    $(".shadow").hide();
    $(".pay").hide();
  });
  $("#go_pay").click(function(event) {
    /* Act on the event */
    window.open("/information/pay.html");

  });
  $(".shadow").click(function(event) {
    /* Act on the event */
    $(".shadow").hide();
    $(".pay").hide();
  });
});	