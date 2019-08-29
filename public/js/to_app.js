function to_app(app_url_android_open,app_url_android_download,app_url_ios_open,app_url_ios_download) {
	var u = navigator.userAgent;
	var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
	var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
	// alert('是否是Android：'+isAndroid);
	// alert('是否是iOS：'+isiOS);
	if(isAndroid){
     	android();
	}
  	if(isiOS){
		ios();
	} 
	function android(){
  //       $("window").attr("location",app_url_android_open) ; /***打开app的协议，有安卓同事提供***/
		// $(document).ready(function(){
		// 	setTimeout(function(){
	 //        	$(window).attr("location",app_url_android_download);/***下载app的地址，有安卓同事提供***/
	 //        },2000);
		// })
		alert('安卓暂时未开放APP');
      };
 
 	function ios(){
        $(document).append("iframe");
        $("iframe").css({
        	"src":app_url_ios_open,
        	"display":"none"
        }) /***打开app的协议，有ios同事提供***/
        
        $(document).ready(function(){
			$("iframe").remove();
			console.log(app_url_ios_download)
			$(window).attr("location",app_url_ios_download);/***下载app的地址***/
		})
      

	};
}
	