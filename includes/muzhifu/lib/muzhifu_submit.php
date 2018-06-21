<?php
/**
 * 拇指付网关文件
 * @link   (Muzhifu, https://www.muzhifu.cc)
 * @author Rainbow <7019732@qq.com>
 */

class Muzhifu
{
    /**
     * Http请求
     * @param  array $params 请求参数
     * @return json         返回数据
     */
    public static function http($params = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.muzhifu.cc/gateway.do');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if(checkmobile() == true) {
            curl_setopt($ch, CURLOPT_USERAGENT, "Dalvik/1.6.0 (Linux; U; Android 4.1.2; DROID RAZR HD Build/9.8.1Q-62_VQW_MR-2)");
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $res = curl_exec($ch);
        return $res;
    }

    /**
     * 签名算法
     * @param  array $params     请求参数
     * @param  string $app_key AppKey
     * @return string             签名字符串
     */
    public static function sign($params, $app_key)
    {
        $para_filter = array();
        foreach ($params as $key => $val){
            if($key == "sign" || $key == "sign_type" || $val == "")continue;
            else    $para_filter[$key] = $params[$key];
        }

        ksort($para_filter);
        reset($para_filter);

        $arg  = "";

        foreach ($para_filter as $key => $val){
            // 不是数组的时候才会组合，否则传入数组会出错
            if (!is_array($val)) {
                $arg .= "$key=$val&";
            }
        }

        //去掉最后一个&字符
        $arg = substr($arg,0,strlen($arg) - 1);
        //如果存在转义字符，那么去掉转义
        if(get_magic_quotes_gpc()){
            $arg = stripslashes($arg);
        }
           //return $arg;
        $string = $arg . $app_key;

        // md5签名
        return strtolower(md5($string));
    }
}