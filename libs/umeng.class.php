<?php
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/android/AndroidBroadcast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/android/AndroidFilecast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/android/AndroidGroupcast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/android/AndroidUnicast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/android/AndroidCustomizedcast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/ios/IOSBroadcast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/ios/IOSFilecast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/ios/IOSGroupcast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/ios/IOSUnicast.php');
require_once(dirname(__FILE__) . '/umeng/src/' . 'notification/ios/IOSCustomizedcast.php');

class Demo {
	public $appkey           = NULL; 
	public $appMasterSecret     = NULL;
	public $timestamp        = NULL;
	public $validation_token = NULL;
	public $production_mode = NULL;

	function __construct($key, $secret,$production_mode=true) {
		$this->appkey = $key;
		$this->appMasterSecret = $secret;
		$this->production_mode = $production_mode;
		$this->timestamp = strval(time());
	}

	function sendAndroidBroadcast() {
		try {
			$brocast = new AndroidBroadcast();
			$brocast->setAppMasterSecret($this->appMasterSecret);
			$brocast->setPredefinedKeyValue("appkey",           $this->appkey);
			$brocast->setPredefinedKeyValue("timestamp",        $this->timestamp);
			$brocast->setPredefinedKeyValue("ticker",           "Android broadcast ticker");
			$brocast->setPredefinedKeyValue("title",            "中文的title");
			$brocast->setPredefinedKeyValue("text",             "Android broadcast text");
			$brocast->setPredefinedKeyValue("after_open",       "go_app");
			// Set 'production_mode' to 'false' if it's a test device. 
			// For how to register a test device, please see the developer doc.
			$brocast->setPredefinedKeyValue("production_mode", "false");
			// [optional]Set extra fields
			$brocast->setExtraField("test", "helloworld");
			print("Sending broadcast notification, please wait...\r\n");
			$brocast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	function sendAndroidUnicast() {
		try {
			$unicast = new AndroidUnicast();
			$unicast->setAppMasterSecret($this->appMasterSecret);
			$unicast->setPredefinedKeyValue("appkey",           $this->appkey);
			$unicast->setPredefinedKeyValue("timestamp",        $this->timestamp);
			// Set your device tokens here
			$unicast->setPredefinedKeyValue("device_tokens",    "xx"); 
			$unicast->setPredefinedKeyValue("ticker",           "Android unicast ticker");
			$unicast->setPredefinedKeyValue("title",            "Android unicast title");
			$unicast->setPredefinedKeyValue("text",             "Android unicast text");
			$unicast->setPredefinedKeyValue("after_open",       "go_app");
			// Set 'production_mode' to 'false' if it's a test device. 
			// For how to register a test device, please see the developer doc.
			$unicast->setPredefinedKeyValue("production_mode", "true");
			// Set extra fields
			$unicast->setExtraField("test", "helloworld");
			print("Sending unicast notification, please wait...\r\n");
			$unicast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	function sendAndroidFilecast() {
		try {
			$filecast = new AndroidFilecast();
			$filecast->setAppMasterSecret($this->appMasterSecret);
			$filecast->setPredefinedKeyValue("appkey",           $this->appkey);
			$filecast->setPredefinedKeyValue("timestamp",        $this->timestamp);
			$filecast->setPredefinedKeyValue("ticker",           "Android filecast ticker");
			$filecast->setPredefinedKeyValue("title",            "Android filecast title");
			$filecast->setPredefinedKeyValue("text",             "Android filecast text");
			$filecast->setPredefinedKeyValue("after_open",       "go_app");  //go to app
			print("Uploading file contents, please wait...\r\n");
			// Upload your device tokens, and use '\n' to split them if there are multiple tokens
			$filecast->uploadContents("aa"."\n"."bb");
			print("Sending filecast notification, please wait...\r\n");
			$filecast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	function sendAndroidGroupcast() {
		try {
			/* 
		 	 *  Construct the filter condition:
		 	 *  "where": 
		 	 *	{
    	 	 *		"and": 
    	 	 *		[
      	 	 *			{"tag":"test"},
      	 	 *			{"tag":"Test"}
    	 	 *		]
		 	 *	}
		 	 */
			$filter = 	array(
							"where" => 	array(
								    		"and" 	=>  array(
								    						array(
							     								"tag" => "test"
															),
								     						array(
							     								"tag" => "Test"
								     						)
								     		 			)
								   		)
					  	);
					  
			$groupcast = new AndroidGroupcast();
			$groupcast->setAppMasterSecret($this->appMasterSecret);
			$groupcast->setPredefinedKeyValue("appkey",           $this->appkey);
			$groupcast->setPredefinedKeyValue("timestamp",        $this->timestamp);
			// Set the filter condition
			$groupcast->setPredefinedKeyValue("filter",           $filter);
			$groupcast->setPredefinedKeyValue("ticker",           "Android groupcast ticker");
			$groupcast->setPredefinedKeyValue("title",            "Android groupcast title");
			$groupcast->setPredefinedKeyValue("text",             "Android groupcast text");
			$groupcast->setPredefinedKeyValue("after_open",       "go_app");
			// Set 'production_mode' to 'false' if it's a test device. 
			// For how to register a test device, please see the developer doc.
			$groupcast->setPredefinedKeyValue("production_mode", "true");
			print("Sending groupcast notification, please wait...\r\n");
			$groupcast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public  function sendAndroidCustomizedcast($alias,$ticker,$title,$text,$after_open="go_app") {
		try {
			$customizedcast = new AndroidCustomizedcast();
			$customizedcast->setAppMasterSecret($this->appMasterSecret);
			$customizedcast->setPredefinedKeyValue("appkey",           $this->appkey);
			$customizedcast->setPredefinedKeyValue("timestamp",        $this->timestamp);
			// Set your alias here, and use comma to split them if there are multiple alias.
			// And if you have many alias, you can also upload a file containing these alias, then 
			// use file_id to send customized notification.
			$customizedcast->setPredefinedKeyValue("alias",            $alias);
			// Set your alias_type here
			$customizedcast->setPredefinedKeyValue("alias_type",       "kUMessage");
			$customizedcast->setPredefinedKeyValue("ticker",           $ticker); // 必填，通知栏提示文字
			$customizedcast->setPredefinedKeyValue("title",            $title); // 必填，通知标题
			$customizedcast->setPredefinedKeyValue("text",             $text);// 必填，通知文字描述 
			$customizedcast->setPredefinedKeyValue("after_open",       $after_open);
			//print("Sending customizedcast notification, please wait...\r\n");
			$result = $customizedcast->send();
			//print("Sent SUCCESS\r\n");
			return;
		} catch (Exception $e) {
			Comm::logger("Android 发送失败 ".$e,'push_umeng_log.txt');
			//print("Caught exception: " . $e->getMessage());
		}
	}

	function sendAndroidCustomizedcastFileId() {
		try {
			$customizedcast = new AndroidCustomizedcast();
			$customizedcast->setAppMasterSecret($this->appMasterSecret);
			$customizedcast->setPredefinedKeyValue("appkey",           $this->appkey);
			$customizedcast->setPredefinedKeyValue("timestamp",        $this->timestamp);
			// if you have many alias, you can also upload a file containing these alias, then
			// use file_id to send customized notification.
			$customizedcast->uploadContents("aa"."\n"."bb");
			// Set your alias_type here
			$customizedcast->setPredefinedKeyValue("alias_type",       "xx");
			$customizedcast->setPredefinedKeyValue("ticker",           "Android customizedcast ticker");
			$customizedcast->setPredefinedKeyValue("title",            "Android customizedcast title");
			$customizedcast->setPredefinedKeyValue("text",             "Android customizedcast text");
			$customizedcast->setPredefinedKeyValue("after_open",       "go_app");
			print("Sending customizedcast notification, please wait...\r\n");
			$customizedcast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	function sendIOSBroadcast() {
		try {
			$brocast = new IOSBroadcast();
			$brocast->setAppMasterSecret($this->appMasterSecret);
			$brocast->setPredefinedKeyValue("appkey",           $this->appkey);
			$brocast->setPredefinedKeyValue("timestamp",        $this->timestamp);

			$brocast->setPredefinedKeyValue("alert", "IOS 广播测试");
			$brocast->setPredefinedKeyValue("badge", 0);
			$brocast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$brocast->setPredefinedKeyValue("production_mode", "false");
			// Set customized fields
			$brocast->setCustomizedField("test", "helloworld");
			print("Sending broadcast notification, please wait...\r\n");
			$brocast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	function sendIOSUnicast() {
		try {
			$unicast = new IOSUnicast();
			$unicast->setAppMasterSecret($this->appMasterSecret);
			$unicast->setPredefinedKeyValue("appkey",           $this->appkey);
			$unicast->setPredefinedKeyValue("timestamp",        $this->timestamp);
			// Set your device tokens here
			$unicast->setPredefinedKeyValue("device_tokens",    "xx"); 
			$unicast->setPredefinedKeyValue("alert", "IOS 单播测试");
			$unicast->setPredefinedKeyValue("badge", 0);
			$unicast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$unicast->setPredefinedKeyValue("production_mode", "false");
			// Set customized fields
			$unicast->setCustomizedField("test", "helloworld");
			print("Sending unicast notification, please wait...\r\n");
			$unicast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	function sendIOSFilecast() {
		try {
			$filecast = new IOSFilecast();
			$filecast->setAppMasterSecret($this->appMasterSecret);
			$filecast->setPredefinedKeyValue("appkey",           $this->appkey);
			$filecast->setPredefinedKeyValue("timestamp",        $this->timestamp);

			$filecast->setPredefinedKeyValue("alert", "IOS 文件播测试");
			$filecast->setPredefinedKeyValue("badge", 0);
			$filecast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$filecast->setPredefinedKeyValue("production_mode", "false");
			print("Uploading file contents, please wait...\r\n");
			// Upload your device tokens, and use '\n' to split them if there are multiple tokens
			$filecast->uploadContents("aa"."\n"."bb");
			print("Sending filecast notification, please wait...\r\n");
			$filecast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	function sendIOSGroupcast() {
		try {
			/* 
		 	 *  Construct the filter condition:
		 	 *  "where": 
		 	 *	{
    	 	 *		"and": 
    	 	 *		[
      	 	 *			{"tag":"iostest"}
    	 	 *		]
		 	 *	}
		 	 */
			$filter = 	array(
							"where" => 	array(
								    		"and" 	=>  array(
								    						array(
							     								"tag" => "iostest"
															)
								     		 			)
								   		)
					  	);
					  
			$groupcast = new IOSGroupcast();
			$groupcast->setAppMasterSecret($this->appMasterSecret);
			$groupcast->setPredefinedKeyValue("appkey",           $this->appkey);
			$groupcast->setPredefinedKeyValue("timestamp",        $this->timestamp);
			// Set the filter condition
			$groupcast->setPredefinedKeyValue("filter",           $filter);
			$groupcast->setPredefinedKeyValue("alert", "IOS 组播测试");
			$groupcast->setPredefinedKeyValue("badge", 0);
			$groupcast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$groupcast->setPredefinedKeyValue("production_mode", "false");
			print("Sending groupcast notification, please wait...\r\n");
			$groupcast->send();
			print("Sent SUCCESS\r\n");
		} catch (Exception $e) {
			print("Caught exception: " . $e->getMessage());
		}
	}

	public  function sendIOSCustomizedcast($alias,$alert,$after_open="go_app") {
		try {
			$customizedcast = new IOSCustomizedcast();
			$customizedcast->setAppMasterSecret($this->appMasterSecret);
			$customizedcast->setPredefinedKeyValue("appkey",           $this->appkey);
			$customizedcast->setPredefinedKeyValue("timestamp",        $this->timestamp);

			// Set your alias here, and use comma to split them if there are multiple alias.
			// And if you have many alias, you can also upload a file containing these alias, then 
			// use file_id to send customized notification.
			$customizedcast->setPredefinedKeyValue("alias", $alias);
			// Set your alias_type here
			$customizedcast->setPredefinedKeyValue("alias_type", "kUMessage");
			//"alert":""/{  可为JSON类型和字符串类型 "title":"title","subtitle":"subtitle","body":"body"}          
			$customizedcast->setPredefinedKeyValue("alert", $alert);
			$customizedcast->setPredefinedKeyValue("badge", 0);
			$customizedcast->setPredefinedKeyValue("sound", "chime");
			// Set 'production_mode' to 'true' if your app is under production mode
			$customizedcast->setPredefinedKeyValue("production_mode", $this->production_mode); //可选，正式/测试模式。默认为正式true
			//print("Sending customizedcast notification, please wait...\r\n");
			$result = $customizedcast->send();
			//print("Sent SUCCESS\r\n");
			return;
		} catch (Exception $e) {
			//print("Caught exception: " . $e->getMessage());
			Comm::logger("Android 发送失败 ".$e,'push_umeng_log.txt');
		}
	}
}
Config::load('umeng');
class UmengAndroidUser extends Demo{
	function __construct() {
		$this->appkey = C('umengAndroidUser')['appkey'];
		$this->appMasterSecret = C('umengAndroidUser')['appMasterSecret'];
		$this->timestamp = strval(time());
	}
}
class UmengAndroidStore extends Demo{
	function __construct() {
		$this->appkey = C('umengAndroidStore')['appkey'];
		$this->appMasterSecret = C('umengAndroidStore')['appMasterSecret'];
		$this->timestamp = strval(time());
	}
}
class UmengIosUser extends Demo{
	function __construct() {
		$this->appkey = C('umengIosUser')['appkey'];
		$this->appMasterSecret = C('umengIosUser')['appMasterSecret'];
		$this->timestamp = strval(time());
	}
}
class UmengIosStore extends Demo{
	
	function __construct() {
		$this->appkey = C('umengIosStore')['appkey'];
		$this->appMasterSecret = C('umengIosStore')['appMasterSecret'];
		$this->timestamp = strval(time());
	}
}
// $umengAndroidUser = new Demo(C('umengAndroidUser')['appkey'], C('umengAndroidUser')['appMasterSecret']);
// $umengAndroidStore = new Demo(C('umengAndroidStore')['appkey'], C('umengAndroidStore')['appMasterSecret']);
// $umengIosUser = new Demo(C('umengIosUser')['appkey'], C('umengIosUser')['appMasterSecret']);
// $umengIosStore = new Demo(C('umengIosStore')['appkey'], C('umengIosStore')['appMasterSecret']);

//IOS
// Set your appkey and master secret here
//$demo = new Demo("59a79d847666134c3f0003e3", "irvn92ly9uj8gd8ltrk7x9tuc4xsoc5h");
//$demo->sendIOSCustomizedcast();
//$demo->sendIOSBroadcast();

//Android
// Set your appkey and master secret here
// $demoAndroid = new Demo("5a17b7e6b27b0a262900001c", "xwjwshrji2jvzesymapp1212zpa62qdw");
// //$demoAndroid->sendAndroidBroadcast();
// $demoAndroid->sendAndroidCustomizedcast();



/* these methods are all available, just fill in some fields and do the test
 * $demo->sendAndroidBroadcast();
 * $demo->sendAndroidFilecast();
 * $demo->sendAndroidGroupcast();
 * $demo->sendAndroidCustomizedcast();
 * //$demo->sendAndroidCustomizedcastFileId();
 *
 * $demo->sendIOSBroadcast();
 * $demo->sendIOSUnicast();
 * $demo->sendIOSFilecast();
 * $demo->sendIOSGroupcast();
 * $demo->sendIOSCustomizedcast();
 */