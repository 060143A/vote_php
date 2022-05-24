<?php
session_start();
function make_rand($length="32"){//验证码文字生成函数   
        $str="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";   
    $result="";   
    for($i=0;$i<$length;$i++){   
        $num[$i]=rand(0,61);   
        $result.=$str[$num[$i]];   
    }   
    return $result;   
}   
$checkcode = make_rand(5);   
$im_x=140;   
$im_y=32;   
function make_crand($length="5") {   
    $string = '';   
    for($i=0;$i<$length;$i++) {   
        $string .= chr(rand(0xB0,0xF7)).chr(rand(0xA1,0xFE));   
    }   
    return $string;   
}   
function getAuthImage($text , $im_x = 200 , $im_y = 32) {   
    $im = imagecreatetruecolor($im_x,$im_y);   
    $text_c = ImageColorAllocate($im, mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));   
    $tmpC0=mt_rand(100,255);   
    $tmpC1=mt_rand(100,255);   
    $tmpC2=mt_rand(100,255);   
    $buttum_c = ImageColorAllocate($im,$tmpC0,$tmpC1,$tmpC2);   
    imagefill($im, 16, 13, $buttum_c);   
    //echo $text;   
    $font = 'simsun.ttc';   
    //echo strlen($text);   
  
    $text=iconv("gb2312","UTF-8",$text);   
    //echo mb_strlen($text,"UTF-8");   
    for ($i=0;$i<mb_strlen($text);$i++)   
    {   
            $tmp =mb_substr($text,$i,1,"UTF-8");   
            $array = array(-1,0,1);   
            $p = array_rand($array);   
            $an = $array[$p]*mt_rand(1,9);//角度   
            $size = 20;   
            imagettftext($im,$size,$an,10+$i*$size*2,25,$text_c,$font,$tmp);   
    }   
  
     $distortion_im = imagecreatetruecolor ($im_x, $im_y);   
     imagefill($distortion_im, 16, 13, $buttum_c);   
     for ( $i=0; $i<$im_x; $i++) {   
         for ( $j=0; $j<$im_y; $j++) {   
             $rgb = imagecolorat($im, $i , $j);   
             if( (int)($i+20+sin($j/$im_y*2*M_PI)*10) <= imagesx($distortion_im) && (int)($i+20+sin($j/$im_y*2*M_PI)*10) >=0 ) {   
                 imagesetpixel ($distortion_im, (int)($i+10+sin($j/$im_y*2*M_PI-M_PI*0.5)*3) , $j , $rgb);   
             }   
         }   
     }   
     //加入干扰象素;   
    $count = 50;//干扰像素的数量   
    for($i=0; $i<$count; $i++){   
            $randcolor = ImageColorallocate($distortion_im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));   
            imagesetpixel($distortion_im, mt_rand()%$im_x , mt_rand()%$im_y , $randcolor);   
    }   
  
    $line_c=5;   
     //imageline   
     for($i=0; $i < $line_c; $i++) {   
         $linecolor = imagecolorallocate($distortion_im, 17, 158, 20);   
         $lefty = mt_rand(1, $im_x-1);   
         $righty = mt_rand(1, $im_y-1);   
         imageline($distortion_im, 0, $lefty, imagesx($distortion_im), $righty, $linecolor);   
     }   
  
     Header("Content-type: image/PNG");   
  
    //以PNG格式将图像输出到浏览器或文件;   
    //ImagePNG($im);   
    ImagePNG($distortion_im);   
  
    //销毁一图像,释放与image关联的内存;   
    ImageDestroy($distortion_im);   
    ImageDestroy($im);   
}
$_SESSION['code']=make_rand(4);
getAuthImage($_SESSION['code']);      
?>  
