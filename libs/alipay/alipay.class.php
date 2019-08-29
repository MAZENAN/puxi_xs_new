<?php

require_once "AopSdk.php";

class Alipay
{
 /**
 * 应用ID
 */
 const APPID = '2019011663005819';
 /**
 *请填写开发者私钥去头去尾去回车，一行字符串
 */
 const RSA_PRIVATE_KEY = 'MIIEowIBAAKCAQEAu0OxapznRKFNlnYw269I/BDFzOxM6oXLY1i5e7D63gz0NEpo8izF6t9iIgeV8r/G+qxBSujmbrs/2FSHloPotJ6B7n9e9fwiGqAGvJ1s49wTW1fCJ45+Qx7Yg+LldcjEOcMa/1J7Ksj18HppT4cggmgJxtmbZmWI3cfAGNlE+XzCeRkxBOtnjWIsTl7ZC/zkn0Y5DanaHVsmIGAJr3u+/lfVPzEJ45Lyp2csECVdDinJXqILj4mKIh58rnY/cqcYNRNEMeIqx2Yhr9dkZY7D0ItNT5GmguDYQCXJX2uipk8v6BO+iRfIzz2ydtc3oNEpHraEgD+N8sZRu7e3ZU4ZHwIDAQABAoIBAF8iPqmY2GynPZFord2NKRjVNIesrE6gdfkcg+5wtKHGFvHRs4sEb++oWGRNUkImZ2HFzM3Pj/FFM2QlXVR74uaPeBa/onB5DKJWFdYQa9c+YJ8Q8FPEMiTLMNefl07FFdr6YWbAck4EFd17crCyRzO4wu7AchANGQECj3aQOlg7yB8y3UsvKDob9gyxZUbItVASOEGwMhORp9sWK7Ox0XbGzIBrDnKrHWG6Zvf318cu0wXVHShPL39UHCDfH1XwzmKahFyAM4uoD/kWyggkklLZ2I+1ihid5LkDC5/du0EDs2oMm/rTWo0O1ospD9L9Qd8FIW74Xqu3wYPHxhZlE6ECgYEA7cb9RV6QLTpHgQXvXnk7i9yQUaaA/8ri4HTcamLkJjqGku+cJRCwifeJ3NtwvXvG8hj5o311hEG/2SgPYtMj+i1OVkkJQ/IqLlIbO6Nn+SWC8OePw5gwN++MbH0T4X/XymoJcSrR+ks5IKeA41E88cOSKoiNDBsP7BBPW8tNP8kCgYEAyZ2t5sZLFdaCTRomyVqn6RgIOHotyn/13rE0MCWgrSLp8k3slrhkJ2pnLztbqabpSltqt5hvN4NdnNP1pXQZPHvOSYZUnldpx8aP3I1yK/hWWRp4UKN9PM+vlFC7aWGmR/fdoOQs4i5hs+NNFFpN+kWa2hj2NF3qDujdO5U+FacCgYBLoOg74TkAebH2ktmw9eR/ttbccZZERdblx6W33N5uXl0hbT7/9w//whFCgzWXvz/nDxSP8L6pI3SO8JP8PeYKk9B/11kwGF1cQFdTH8VZVJoSX8S1VLm5gOLsOthQ+CW9xv5b1V/WOYjhHwX6x4MX7rmV97rNJ+pnjkR/kOlwKQKBgQCpnZTyxDng+mEOuoSM+06txAEOeoNRjEtt+QidxNojLm9A4Ru8RQ5FNrfuPXLFDF3Rp4zlPkG6ozK7QHq1ojGk98c5heBkgcfFQSBAfWLi6P7D4Yf81z4CTfs5vJ2eb39zpmx28d9svXaG3yA2ki5t8ebvuvZOYgAKYQ/WE51ymwKBgArDDH+Y6ECsH/j+tFckEHkVYmlute4CDXPIsNHhsRZW6PwkJ8JS2hYrfCXI6DNTNIaTgLXv0uL0EG5deXwmykTlDXj4QxxUsjOlh+OeSb6axhvLLMJoYNPBP5+55D5f+FZdnrYbgnDmPT3yyLRw+DBZ7DhqC0XnbrxeBrH8Vv8P';
 /**
 *请填写支付宝公钥，一行字符串
 */
 const ALIPAY_RSA_PUBLIC_KEY = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAijeAQLqJt2azFXaMaYD6ApOZlv764BHOneZut5DMPhalSpV9RnXAV4iwoH4wb9acM9dsWNIb8PNz+V29MyL3sYsK60IFLTRbIyMOLMAF1dSK76MOqOhyaRPbvuFseZsf1/d5e1ot/757/9csAKDjtnE9xAHnSKUIBzG/4MqDMiEpfckmwnddXmi3LverD2DojPqhtWwXr0+IGC29aHCS5kAPI9tOQjFcAHqZ+esTeOeCX7tsANNBqM6Ac5/ViuqNQy2f1CUCJF02aTimlO0hYT+nYyaXFzhlDOolDw4iQqiNm4vhH1WdAC9zSkeGsWTSqDd558I7eQ7rhEK5A7at0QIDAQAB';
 /**
 * 支付宝服务器主动通知商户服务器里指定的页面
 * @var string
 */
 private $callback = "http://test1.part.cn/app_api/public/alipay_notify.php";


 
 /**
 *生成APP支付订单信息
 * @param string $orderId 商品订单ID
 * @param string $subject 支付商品的标题
 * @param string $body 支付商品描述
 * @param float $pre_price 商品总支付金额
 * @param int $expire 支付交易时间
 * @return bool|string 返回支付宝签名后订单信息，否则返回false
 */
 public function unifiedorder($orderId, $subject,$body,$pre_price,$expire){
   try{
    $aop = new \AopClient();
    $aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
    $aop->appId = self::APPID;
    $aop->rsaPrivateKey = self::RSA_PRIVATE_KEY;
    $aop->format = "json";
    $aop->charset = "UTF-8";
    $aop->signType = "RSA2";
    $aop->alipayrsaPublicKey = self::ALIPAY_RSA_PUBLIC_KEY;
    //实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
    $request = new \AlipayTradeAppPayRequest();
    //SDK已经封装掉了公共参数，这里只需要传入业务参数
    $bizcontent = "{\"body\":\"$body\"," //支付商品描述
    . "\"subject\":\"$subject\"," //支付商品的标题
    . "\"out_trade_no\":\"$orderId\"," //商户网站唯一订单号
    . "\"timeout_express\":\"{$expire}m\"," //该笔订单允许的最晚付款时间，逾期将关闭交易
    . "\"total_amount\":\"{$pre_price}\"," //订单总金额，单位为元，精确到小数点后两位，取值范围[0.01,100000000]
    . "\"product_code\":\"QUICK_MSECURITY_PAY\""
    . "}";
    $request->setNotifyUrl("http://test1.part.cn/app_api/public/alipay_notify.php");
    $request->setBizContent($bizcontent);
    //这里和普通的接口调用不同，使用的是sdkExecute
    $response = $aop->sdkExecute($request);
    return  $response;
    //return htmlspecialchars($response);//就是orderString 可以直接给客户端请求，无需再做处理。
   }catch (\Exception $e){
    return false;
   }
 
 }
    public function refund($outTradeNo,$refundAmount){
        $aop = new \AopClient ();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = self::APPID;
        $aop->rsaPrivateKey = self::RSA_PRIVATE_KEY;
        $aop->alipayrsaPublicKey=self::ALIPAY_RSA_PUBLIC_KEY;
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='UTF-8';
        $aop->format='json';
        $request = new AlipayTradeRefundRequest();

        $bizContent = [];
        $bizContent['refund_amount'] = $refundAmount;
        $bizContent['out_trade_no'] = $outTradeNo;
        $request->setBizContent(json_encode($bizContent));
        $result = $aop->execute ( $request); 

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultCode = $result->$responseNode->code;
        $resultMsg = $result->$responseNode->msg;

        return $result->$responseNode;
    }
}
