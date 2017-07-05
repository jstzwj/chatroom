<?php

use Illuminate\Http\Request;

function set_session($array)
{
  foreach ($array as $key => $value) {
    session()->put($key, $value);
  }
}

/**
 * [set_error_session 临时将错误信息保存至session中]
 * @param [type] $text  [description]
 * @param [type] $title [description]
 */
function set_error_session($text, $title = null)
{
    if($title == null)
        $title = '错误提示';

    $data = [
      'title' => $title,
      'text'  => $text
    ];

    return session()->flash('error', $data);
}

/**
   * [set_success_session 临时将成功信息保存至session中]
   * @param [type] $text  [description]
   * @param [type] $title [description]
   */
function set_success_session($text, $title = null)
{
    if($title == null)
        $title = '成功提示';

    $data = [
      'title' => $title,
      'text'  => $text
    ];

    return session()->flash('success', $data);
}

/**
   * [set_info_session 临时将信息保存至session中]
   * @param [type] $text  [description]
   * @param [type] $title [description]
   */
function set_info_session($text, $title = null)
{
    if($title == null)
        $title = '信息提示';

    $data = [
      'title' => $title,
      'text'  => $text
    ];

    return session()->flash('info', $data);
}

/**
   * [array_to_string 将数组转换为字符串]
   * @param  [type] $array [description]
   * @param  string $split [description]
   * @return [type]        [description]
   */
function array_to_string($array, $split = '<br>')
{
    $string = '';

    if(count($array) == 0)
      return $string;

    foreach ($array as $value)
    {
      $string = $string.$split.$value;
    }

    return substr($string, strlen($split));
}

function get_fix_length_number($number, $length = 2)
{
  $len = strlen($number.'');

  if($len >= $length)
    return $number.'';

  for($i = $length - $len; $i > 0; $i--)
  {
    $number = '0'.$number;
  }
  return $number.'';
}

function get_client_ip() {
  if (getenv("HTTP_CLIENT_IP"))
    return getenv("HTTP_CLIENT_IP");
  else if(getenv("HTTP_X_FORWARDED_FOR"))
    return getenv("HTTP_X_FORWARDED_FOR");
  else if(getenv("REMOTE_ADDR"))
    return getenv("REMOTE_ADDR");
  else
    return "";
}
function msubstr($str, $start, $len) {   //ȡ  
   $tmpstr = "";  
   $strlen = $start + $len;  
   if(preg_match('/[\\d\\s]{3,}/',$str)){$strlen=$strlen-3;}  
   for($i = 0; $i < $strlen; $i++) {  
       if(ord(substr($str, $i, 1)) > 0xa0) {  
           $tmpstr .= substr($str, $i, 3);  
           $i++;  
       } else  
           $tmpstr .= substr($str, $i, 1);  
     }  
   return $tmpstr;  
 }  
  function substr_utf8($string,$start,$length)  
    {       //by aiou  
         $chars = $string;  
         $len = strlen($string);
         $m = 0;
         $n = 0;
         //echo $string[0].$string[1].$string[2];  
         $i=0;  
         do{  
            if (preg_match ("/[0-9a-zA-Z]/", $chars[$i])){//纯英文  
                $m++;  
            }  
        else {$n++;     }//非英文字节,  
            $k = $n/3+$m/2;  
            $l = $n/3+$m;//最终截取长度；$l = $n/3+$m*2？  
            $i++;  
        } while($k < $length && $i < $len);  
         $str1 = mb_substr($string,$start,$l,'utf-8');//保证不会出现乱码  
         return $str1;  
    } 
