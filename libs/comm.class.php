<?php

class Comm {

    static function links($args, $mgargs = [], $word = true) {
        $pare = [];
        foreach ($args as $key => $value) {
            if (isset($mgargs[$key])) {
                $value = $mgargs[$key];
            }
            if ($value == '') {
                $value = 0;
            }
            $pare[] = $value;
        }
        $link = join('-', $pare) . '.html';
        if ($word) {
            $keyword = SGet('keyword');
            if (!empty($keyword)) {
                $link.='?keyword=' . urlencode($keyword);
            }
        }
        return $link;
    }

    static function getOrderID() {
        $count = DB::getval('select count(1) from @pf_order where add_date=?', [date('Y-m-d')]);
        $count = $count + 1;
        $stoid = date('YmdHis') . str_pad($count, 4, '0', STR_PAD_LEFT) . uniqid();
        return $stoid;
    }

    static function clearHtml($content) {
        
    }

    //生成订单数据
    static function getOrder($userid, $orderType, $params, &$err) {
        $default = [
            'id'=>0,
            'operator_id'=>0,
            'start_time'=>'',
        ];
        $params = array_merge($default,$params);
        $relationId = $params['id'];
        $operatorId = $params['operator_id'];
        $startTime = $params['start_time'];
        if (empty($orderType)) {
            $err = '不存在的订单类型！';
            return null;
        }
        elseif ($orderType == 1001) {
            if (!$operatorId) {
                $err = "operator_id:$operatorId;参数错误";
                return null;
            }
            $row = DB::getone('select * from @pf_product where id=?', [$relationId]);

            $operator = DB::getone('select * from @pf_operator where id = ? and store_id = ? ',[$operatorId,$row['store_id']]);
            if (!$operator) {
                $err = "operator_id:$operatorId;relation_id:$relationId;参数错误";
                return null;
            }
        }
        elseif ($orderType == 1002) {
            $row = DB::getone('select * from @pf_goods where id=?', [$relationId]);
            
        }
        if (!$row) {
                $err = '不存在的商品！';
                return null;
            }
            elseif ($row['allow']==0) {
                $err = '商品已下架！';
                return null;
        }
        
        
        $data = [];
        $data['orderid'] = self::getOrderID();
        $data['operator_id'] = $operatorId;
        $data['relation_id'] = $relationId;
        $data['title'] = $row['name'];
        $data['img'] = $row['img'];
        $data['need_topay'] = $row['price'];
        $data['paid'] = 0;
        $data['userid'] = $userid;
        $data['addtime'] = date('Y-m-d H:i:s');
        $data['add_date'] = date('Y-m-d');
        $data['order_type'] = $orderType;
        $data['type'] = $row['type'];
        $data['time'] = $row['time'];

        if ($startTime) {
            $data['start_time'] = $startTime;
            $data['end_time'] = date('Y-m-d H:i:s',strtotime($startTime)+$row['time']*60);
        }
        if ($orderType == 1001) {
            $data['store_id'] = $row['store_id'];
            $store = DB::getone('select name from sl_store where id = ?',[$row['store_id']]);
            $data['mechanism'] = $store['name'];
        }
        
        
        return $data;
    }

    static function areaNames($areastr) {
        $area = is_array($areastr) ? $areastr : json_decode($areastr, true);
        $names = [];
        if (!is_array($area)) {
            return "";
        }
        foreach ($area as $id) {
            $name = DB::getval('select name from @pf_area where id=?', [$id]);
            if ($name) {
                $names[] = $name;
            }
        }
        return join(' - ', $names);
    }

    static function addScore($userid, $title, $score) {
        $vals = [];
        $vals['userid'] = $userid;
        $vals['title'] = $title;
        $vals['score'] = $score;
        $vals['addtime'] = date('Y-m-d H:i:s');
        DB::insert('@pf_score_record', $vals);
        $user = [];
        $user['score'] = DB::sql('ifnull(score,0)+' . $score);
        DB::update('@pf_member', $user, $userid);
    }

    static function AuthData($userid, $url = '', $type = 'auth') {
        $code = Funcs::randNum(24);
        DB::insert('@pf_authdata', [
            'userid' => $userid,
            'type' => $type,
            'code' => $code,
            'expired' => time() + 86400,
            'url' => $url
        ]);
        return $code;
    }

    static function AuthChk($userid, $code, &$err = '', $type = 'auth') {
        $row = DB::getone('select * from @pf_authdata where userid=? and code=? and type=?', [$userid, $code, $type]);
        if (!$row) {
            $err = '邮箱认证链接有误。';
            return false;
        }
        if ($row['expired'] < time()) {
            $err = '邮箱认证已超时，请重新发送邮件。';
            return false;
        }
        DB::update('@pf_authdata', ['auth' => 1], $row['id']);
        return $row['url'];
    }

    static function getCampDate($type, $id, $depid = 0, &$err = '') {
        $dtbs = ['cncamp' => '@pf_camp_date', 'glcamp' => '@pf_camp_date'];
        if (empty($type) || empty($dtbs[$type])) {
            $err = '不存在的订单类型！';
            return null;
        }
        if ($depid == 0) {
            return DB::getlist('select id,periods,start,days,cost,deposit,remark,split_ratio,tourists,parent,if(start>=curdate(),1,0) as allow from ' . $dtbs[$type] . ' where campid=?  order by start asc', [$id]);
        } elseif ($depid == -1) {
            return DB::getone('select id,periods,start,days,cost,deposit,remark,split_ratio from ' . $dtbs[$type] . ' where campid=? and start>=curdate() order by cost asc, start asc limit 0,1', [$id]);
        } else {
            return DB::getone('select id,periods,start,days,cost,deposit,remark,split_ratio,scommision from ' . $dtbs[$type] . ' where id=? and campid=? and start>=curdate() order by cost asc, start asc', [$depid, $id]);
        }
    }

    static function getCampDatePeple($type, $depid, &$err = '') {
        if (empty($type) ) {
            $err = '不存在的订单类型！';
            return null;
        }
        if ($depid == 0) {
            $err = '不存在的订单类型！';
            return null;
        }
        return DB::getone('select id,tourists,`parent` from @pf_camp_date where id=?', [$depid]);
    }

    static function formatCampDate($row) {
        return '第' . $row['periods'] . '期 ' . $row['start'] . ' 出发共 ' . $row['days'] . ' 天 ' . $row['remark'];
    }
    static function sendMessage($msg){
      require ROOT_DIR . "libs/msg.class.php";
      Msg::send($msg);
    }
    /*
    AppType 0 ：用户端   1 商家技师端
    */
    static function sendUmengMessage($AppType, $uid,$title,$text){

      require_once ROOT_DIR . "libs/umeng.class.php";
      $alert = [
        'title'=>$title,
        'subtitle'=>'',
        'body'=>$text,
      ];

      if ($AppType==0) {
        $umengAndroidUser = new UmengAndroidUser();
        $resultAndroid = $umengAndroidUser->sendAndroidCustomizedcast($uid,$title,$title,$text,$after_open="go_app");
      }elseif ($AppType==1) {
        $umengAndroidStore = new UmengAndroidStore();
        $resultAndroid = $umengAndroidStore->sendAndroidCustomizedcast($uid,$title,$title,$text,$after_open="go_app");
      }
      if ($resultAndroid !== NULL) {
          if (!$resultAndroid['ret'] == 'SUCCESS') {
            Comm::logger("Android 发送失败 error_code:".$resultAndroid['data']['error_code'].";AppType:$AppType;uid:$uid;title:$title;text:$text",'push_umeng_log.txt');
          }else{
            Comm::logger("Android 发送成功 AppType:msg_id:".$resultAndroid['data']['msg_id'].";$AppType;uid:$uid;title:$title;text:$text",'push_umeng_log.txt');
            if ($AppType==0) {
                $umengIosUser = new UmengIosUser();
                $resultIos = $umengIosUser->sendIOSCustomizedcast($uid,$alert);
              }elseif ($AppType==1) {
                $umengIosStore = new UmengIosStore();
                $resultIos = $umengIosStore->sendIOSCustomizedcast($uid,$alert);
              }
              if (!$resultIos['ret'] == 'SUCCESS') {
                Comm::logger("Ios 发送失败 error_code:".$resultIos['data']['error_code'].";AppType:$AppType;uid:$uid;title:$title;text:$text",'push_umeng_log.txt');
              }else{
                Comm::logger("Ios 发送成功 AppType:msg_id:".$resultIos['data']['msg_id'].";$AppType;uid:$uid;title:$title;text:$text",'push_umeng_log.txt');
              }
          }
      }

     return;
    }
    public static function logger($log_content,$log_filename) {

            $max_size = 1000000;
            if (file_exists($log_filename) and ( abs(filesize($log_filename)) > $max_size)) {
                unlink($log_filename);
            }
            file_put_contents($log_filename, date('Y-m-d H:i:s') . " " . $log_content . "\r\n", FILE_APPEND);
    }

    public static function orderMsg($order,$operate){
        //return;
        $storeInfo = Comm::getStoreInfo($order['store_id']);
        $operatorInfo = Comm::getOperatorInfo($order['operator_id']);
        $orderUserInfo = Comm::getUserInfo($order['userid']);
        $uid = $order['userid'];
        if (empty($storeInfo)||empty($operatorInfo)||empty($orderUserInfo)) {
            //return;
        }
        //var_dump($order,$storeInfo,$operatorInfo ,$orderUserInfo,"dd");die();
        
        switch ($operate) {
          case 'paySuccess':
            //推用户 - 只推系统，无友盟
            $msg = [];
            $msg['userid'] = $order['userid'];
            $msg['type'] = 2;
            $msg['title'] = '交易通知';
            $msg['content'] = '您已成功购买['.$order['title'].']服务,订单编号为'.$order['orderid'];
            Comm::sendMessage($msg);
            //推商家、推技师
            
            $storeUmengTitle = '交易通知';
            $storeUmengText = '用户'.$orderUserInfo['nickname'].'购买了技师'.$operatorInfo['name'].'的['.$order['title'].']服务,订单编号为'.$order['orderid'].'，请及时处理';
            Comm::sendUmengMessage(1, $storeInfo['user_id'],$storeUmengTitle,$storeUmengText);
            $operatorUmengTitle = '交易通知';
            $operatorUmengText = '用户'.$orderUserInfo['nickname'].'购买了['.$order['title'].']服务,订单编号为'.$order['orderid'].'，请及时处理';
            Comm::sendUmengMessage(1, $operatorInfo['user_id'],$operatorUmengTitle,$operatorUmengText);
            break;
          case 'cancel':
            //推送
            $storeUmengTitle = '订单取消通知';
            $storeUmengText = '用户'.$orderUserInfo['nickname'].'购买的技师'.$operatorInfo['name'].'的['.$order['title'].']服务已被用户取消,订单编号为'.$order['orderid'].'，请及时处理';
            Comm::sendUmengMessage(1, $storeInfo['user_id'],$storeUmengTitle,$storeUmengText);
            break;
          case 'refund':
            # 推技师
            $operatorUmengTitle = '订单申请退款通知';
            $operatorUmengText = '用户'.$orderUserInfo['nickname'].'购买的技师'.$operatorInfo['name'].'的['.$order['title'].']服务已申请退款,订单编号为'.$order['orderid'].'，请及时处理';
            Comm::sendUmengMessage(1, $operatorInfo['user_id'],$operatorUmengTitle,$operatorUmengText);
            break;
          case 'confirm':
                //推用户 
                $msg = [];
                $msg['userid'] = $uid;
                $msg['type'] = 2;
                $msg['title'] = '接单通知';
                $msg['content'] = '您购买的['.$order['title'].']服务,订单编号为'.$order['orderid'].'，已被确认';
                Comm::sendMessage($msg);

                Comm::sendUmengMessage(0, $order['userid'],$msg['title'],$msg['content']);
                break;
          case 'refundSuccess':
                //推用户
                $msg = [];
                $msg['userid'] = $uid;
                $msg['type'] = 2;
                $msg['title'] = '退款通知';
                $msg['content'] = '您购买的['.$order['title'].']服务,订单编号为'.$order['orderid'].'，已完成退款，请及时查收';
                Comm::sendMessage($msg);
                Comm::sendUmengMessage(0, $order['userid'],$msg['title'],$msg['content']);
                //推商家
                $storeUmengTitle = '退款通知';
                $storeUmengText = '用户'.$orderUserInfo['nickname'].'购买的技师'.$operatorInfo['name'].'的['.$order['title'].']服务已退款成功,订单编号为'.$order['orderid'].'，请及时处理';
                Comm::sendUmengMessage(1, $storeInfo['user_id'],$storeUmengTitle,$storeUmengText);
                break;
            case 'refundFail':
                //推用户
                $msg = [];
                $msg['userid'] = $uid;
                $msg['type'] = 2;
                $msg['title'] = '退款通知';
                $msg['content'] = '您购买的['.$order['title'].']服务,订单编号为'.$order['orderid'].'，退款未通过审核';
                Comm::sendMessage($msg);
                Comm::sendUmengMessage(0, $order['userid'],$msg['title'],$msg['content']);
                //推商家
                $storeUmengTitle = '退款通知';
                $storeUmengText = '用户'.$orderUserInfo['nickname'].'购买的技师'.$operatorInfo['name'].'的['.$order['title'].']，退款未通过审核,订单编号为'.$order['orderid'].'，请及时处理';
                Comm::sendUmengMessage(1, $storeInfo['user_id'],$storeUmengTitle,$storeUmengText);
                break;
          default:
            break;
        }
    
    }
    static function getStoreInfo($storeId){
      $storeUser = [];
      if ($storeId) {
          $store = DB::getone('select user_id,name,wxpay_img,alipay_img from @pf_store where id = ? limit 1',[$storeId]);
          if ($store) {
              # code...
            $store['wxpay_img'] = Comm::replace_image(3,$store['wxpay_img']);
            $store['alipay_img'] = Comm::replace_image(3,$store['alipay_img']);
          }
          $storeUser = $store;
      }

      return $storeUser;
      
    }
    static function getOperatorInfo($operatorId){
      $operatorUser = [];
      if ($operatorId) {
          $operator = DB::getone('select user_id,name,img_head,mobile from @pf_operator where id = ? limit 1',[$operatorId]);
          $operatorUser  = $operator;
      }

      return $operatorUser;
      
    }
    static function getUserInfo($userId){
      $user = [];
      if ($userId) {
        $user = DB::getone('select mobile,nickname,name,msg_read_time,img_head from @pf_member where id =?',[$userId]);
      }
      return $user;
    }
    static function formatDistance($distance){
      return $distance>1000 ? round($distance/1000,2).'km' : round($distance,2).'m';
    }


    static function alipayCreate($totalAmount,$body,$subject,$outTradeNo, $goodsType=1){
        Config::load('alipay');
        require_once ROOT_DIR . "libs/alipay/alipay.class.php";

        $aliPay = new Alipay();

        $result = $aliPay->unifiedorder('A'.$outTradeNo,$subject,$body,$totalAmount,3600);
        if (!$result){
            Comm::logger("Alipay  :result:".json_encode($result,JSON_UNESCAPED_UNICODE ),'alipay_log.txt');
            return false;
        }
    
        return $result;
    }

    public static function alipayRefund($outTradeNo,$refundAmount){
        require_once ROOT_DIR . "libs/alipay/alipay.class.php";
        $aliPay = new Alipay();

        $result = $aliPay->refund('A'.$outTradeNo,$refundAmount);
        if ($result->code!='10000'){
            Comm::logger("Alipay  Refund :result:".json_encode($result,JSON_UNESCAPED_UNICODE ),'alipay_refund_log.txt');
            return false;
        }
        
        return $result;

    }

    static function wxpayCreate($totalAmount,$body,$subject,$outTradeNo){
        Config::load('wxpay');
        require_once ROOT_DIR . "libs/wxpayApp/wxpay.class.php";
        // 统一下单
        $wxPay = new Wxpay();

        $result = $wxPay->send('W'.$outTradeNo, $totalAmount, $subject,$error);

        if ($result['result_code']!='SUCCESS'){
            Comm::logger("Wxpay  :result:".json_encode($result,JSON_UNESCAPED_UNICODE ),'wxpay_log.txt');
            return false;
        }
             

        $now=time();
        $result['timeStamp'] = $now;
        $result['package'] = 'Sign=WXPay';
        $result['paySign'] = $wxPay->sign(
            array(
                'appid'=>C('appid'),
                'noncestr'=>$result['nonce_str'],
                'package'=>'Sign=WXPay',
                'timestamp'=>$now,
                'prepayid'=>$result['prepay_id'],
                'partnerid'=>C('partnerid')

            )
        );
        $result['signType'] = 'MD5';
        $result['key'] = C('apiKey');

    
        return $result;
    }

    public static function wxpayRefund($outTradeNo,$outRefundNo,$refundAmount,$totalAmount){
        Config::load('wxpay');
        require_once ROOT_DIR . "libs/wxpayApp/wxpay.class.php";

        $wxPay = new Wxpay();
        $result = $wxPay->wxRefund('W'.$outTradeNo,'W'.$outRefundNo,$refundAmount,$totalAmount);
        //var_dump($result);die();
        if ($result['result_code']!='SUCCESS'){
            Comm::logger("Wxpay Refund :result:".json_encode($result,JSON_UNESCAPED_UNICODE ),'wxpay_refund_log.txt');
            return false;
        }
        

        return $result;

        

    }

    //验证手机号码
    public static function check_mobile_format($mobile)
    {
      $return = [];
      $return['code'] = 101;
      $return['err_msg'] = '';
      if(empty($mobile))
      {
        $return['err_msg'] = '手机号码为空';
      }
      elseif(!empty($mobile) && !preg_match("/^1[34578]\d{9}$/",$mobile))
      {
        $return['err_msg'] = '手机号码格式不正确';
      }
      else{
        $return['code'] = 0;
      }

      return $return;
    }
    //验证手机验证码格式是否正确
    public static function check_mbcode_format($code){
      $return = [];
      $return['code'] = 101;
      $return['err_msg'] = '';
      if(empty($code))
      {
        $return['err_msg'] = '验证码为空';
      }
      if(!preg_match("/^[A-Za-z0-9]{6}$/",$code)){
        $return['err_msg'] = '验证码格式不正确';
      }
      else{
        $return['code'] = 0;
      }
      return $return;
    }
    //验证手机验证码是否正确
    public static function check_mbcode($mobile,$code){
      $return = [];
      $return['code'] = 101;
      $return['err_msg'] = '';
      $row = DB::getone("SELECT * from @pf_mbcodelog where mobile=? order by id desc limit 1", array($mobile));
      
      if (!empty($row)&&($row['mbcode']==$code) ){
          $return['code'] = 0;
      }else{
        $return['err_msg'] = '手机验证码不正确';
      }
      return $return;
    }
    public static function sendMbCode($ip,$mobile){
      $return = [];
      $return['code'] = 101;
      $return['err_msg'] = '';

      Config::load('sms');
      require ROOT_DIR . "libs/sms.class.php";

      $mbcode = Funcs::randNum(6);
      $rs = SMS::sendMbCode($mobile,$mbcode,$type=1);
      //var_dump($rs);
      if (isset($rs->Code) && $rs->Code=='OK') {
        DB::insert('@pf_mbcodelog', array('mobile' => $mobile, 'mbcode' => $mbcode , 'ip' => $ip, 'addtime' => time()));
        $return['code'] = 0;
        $return['data'] = ['mb_code'=>$mbcode];
      }else{
        $return['err_msg'] = $rs->Message;
      }

      return $return;
            
     }
     public static function replace_image($type,$img){
      if (!$img) {
        return '';
      }
      else{
        return C('aliyunOss')['get_domain'].$img;
      }
    }
    public static function removeCdnPrefix($url){
        Config::load('upload');
        return str_replace(C('aliyunOss')['get_domain'], '', $url);
    }
    public static function text_format($text){
      return $text ? $text :'无';
    }
    public static function money_format($money,$format = 0){
        if ($format == 0) {
            return floatval($money).'元';
        }elseif ($format ==1 ) {
            return floatval($money);
        }
      
    }
    public static function time_format($time){
      return $time.'分钟';
    }

    //商家 1 ； 用户 2 ；技师 3；
    public static function get_operator_coordiate($id,$storeId){
      $coordinate = [];
      $store = DB::getone('select user_id from @pf_store where id = ? limit 1',[$storeId]);
      $linkage = DB::getone('select lat,lng from  @pf_member_linkage where user_id = ? and type = 1 limit 1',[$store['user_id']]);
      if ($linkage) {
        $coordinate = $linkage;
      }
      
      return $coordinate;
    }

    /**
     * 求两个已知经纬度之间的距离,单位为米
     * 
     * @param lng1 $ ,lng2 经度
     * @param lat1 $ ,lat2 纬度
     * @return float 距离，单位米
     * @author www.Alixixi.com 
     */
    public static function get_distance($coordinate1='',$coordinate2='') {
        return '1.70km';

        $lng1 = $coordinate1['lng'];
        $lat1 = $coordinate1['lat'];
        $lng2 = $coordinate2['lng'];
        $lat2 = $coordinate2['lat'];
        // 将角度转为狐度
        $radLat1 = deg2rad($lat1); //deg2rad()函数将角度转换为弧度
        $radLat2 = deg2rad($lat2);
        $radLng1 = deg2rad($lng1);
        $radLng2 = deg2rad($lng2);
        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;
        $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2))) * 6378.137 * 1000;
        return $s;
    } 
    public static function getProductTags($productInfo){
        $tags = [];
        if ($productInfo) {
            if ($productInfo['sale_num']>100) {
                $tags[] = 'hot';
            }
            if (time()-strtotime($productInfo['add_time']<3600*10)) {
                $tags[] = 'new';
            }
        }
        return $tags;
    }

    public static function getCycle($cycle){
        $arr = [
            '1' => '旬刊',
            '2' => '半月刊',
            '3' => '月刊',
            '4' => '双月刊',
            '5' => '季刊',
            '6' => '半年刊',
            '7' => '年刊',
        ];

        return isset($arr[$cycle]) ? $arr[$cycle] : '';
    }
}
