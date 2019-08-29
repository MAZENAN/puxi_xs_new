/*左右滚动*/
var myScroll;
var myScroll2;
function loaded () {
  myScroll = new IScroll('#wrapper', { scrollX: true, freeScroll: true, scrollbars: false });
  myScroll2 = new IScroll('#wrapper2', { scrollX: true, freeScroll: true, scrollbars: false });
}
$(document).ready(function(){	 
      $(".exten").parents(".div").css("paddingTop","9px");
      if($(".indexf ul li img").height()!=$(".indexf ul li img").width()){
      //$(".indexf ul li img").height($(".indexf ul li img").width());
      }
      /*首页成长快报滚动*/     
      // $(".new_one ul li").eq(0).css({"top":"0"});
      // var indexOld=0;
      // setInterval(function(){  
      // indexOld++;    

	     //    if(indexOld==$(".new_one ul li").index()+1){                      
	     //      indexOld=0;
	     //    }
      //        $(".new_one ul li").eq(indexOld).css({"top":"0","transition":".5s all ease"}).siblings().css({"top":"46px","transition":"none"});
      //        //$(".new_one ul li").eq(indexNew).animate({top:0});
                                   
      //  },1500); 

       /*判断ios设备*/
		if (/iP(hone|od|ad)/.test(navigator.userAgent)) {
		  var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/),
		    version = parseInt(v[1], 10);
		  if(version >= 8){
		  	$(".appdownload").show();		  	
		  	$(".forum_list .label,.forum_list ul li,.forum_list,.tips,.article_first dd dl,.new_one ul a span,.grow_list ul li h3,.grow_boot,.user-boot,.extension ul li,.global_new .global_icon span,.global_con-select h2,.global_con-select #orderform ul.detail li div,.global_con-total,.comment_grow h3,.grow_dlist_about .global-box,.comment_head img,#updown,.confirmorder_list2 ul li,.user-list ul li,.number_select ul li div.txt .inp,.new_one,.comment_grow h3,.date_select_par #wrapper").addClass("borderhalf");
		  }
		} 
		/*引流链接*/
		 $(".drainage_link").on("click",function(){
	      window.location.href="https://itunes.apple.com/us/app/ying-tian-xia-quan-guo-shou/id1151004913?mt=8";
	     });
	     $(".close").on("click",function(){
            $(this).parents(".layer_star").hide();
            $(".evaluate_layer_mask").hide();
            $(".layer_bg").hide();
	     });
         /**/
       
  });



