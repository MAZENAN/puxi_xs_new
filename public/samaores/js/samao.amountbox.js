(function($,undefined){$.fn.amountbox=function(){this.each(function(index,element){var that=$(element);var lable=$('<span class="amount-btns"></span>').insertAfter(that);var increase=$('<span class="amount-increase"></span>').appendTo(lable);var decrease=$('<span class="amount-decrease"></span>').appendTo(lable);var Timer=null;var Timer2=null;var valinc=0;var incfunc=function(){var val=that.val()||'0';var str=val.split('.');var ival=parseInt(str[0]);var fval='';if(str[1]){fval='.'+str[1];}
if(ival===NaN){ival=0;}
ival+=valinc;that.val(ival+fval);};var cleanTimer=function(){if(Timer!=null){window.clearInterval(Timer);Timer=null;}};var cleanTimer2=function(){if(Timer2!=null){window.clearTimeout(Timer2);Timer2=null;}};increase.on('mousedown',function(){valinc=1;incfunc();cleanTimer2();Timer2=window.setTimeout(function(){cleanTimer();if(valinc!=0){Timer=window.setInterval(incfunc,50);}},500);return false;});decrease.on('mousedown',function(){valinc=-1;incfunc();cleanTimer2();Timer2=window.setTimeout(function(){cleanTimer();if(valinc!=0){Timer=window.setInterval(incfunc,50);}},500);return false;});$(document.body).on('mouseup',function(){cleanTimer2();cleanTimer();valinc=0;});});};})(jQuery);