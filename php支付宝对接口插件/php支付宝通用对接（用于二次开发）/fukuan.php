<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>支付宝-充值页面</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>
<body>
<p align="center">&nbsp;</p>
  <div align="center"><img src="shoukuan.jpg" width="329" height="500" />
      </p>
  </div>
<p align="center" class="STYLE1"><strong>扫描充值完毕后，系统后台处理需要1分钟，所以请在1分钟之后再输入以下内容</strong></p>
<form name="form1" action="" method="post">
  <p align="center">订单号:
    <input type="text" name="ddh" />
  *</p>
  <p align="center">金&nbsp;&nbsp;额:
    <input type="text" name="je" />
  *</p>
  <p align="center"><strong>金额请输入到小数点后两位，比如:<span class="STYLE1">9.10</span>、<span class="STYLE1">8.00</span>、<span class="STYLE1">20.00</span>、<span class="STYLE1">18.91</span>、<span class="STYLE1">0.10</span></strong></p>
  <div align="center">
    <input name="submit" type="submit" value="提交" />
  </div>
</form>
<div align="center">
<?php
if($_POST["submit"]=="提交"){
  echo "您输入的订单号为：".$_POST["ddh"]."&nbsp;&nbsp;金额为：".$_POST["je"];
  $a="[".$_POST["ddh"]."]----[".$_POST["je"]."]";
  $file_path="bad.txt"; 
  $bad=file_get_contents($file_path); 
  $bad=str_replace("rn","<br/>",file_get_contents($file_path)); 
  fclose($fp); 
  $ed = strpos($bad, $a) !== false ? '存在' : '不存在';	
  if($ed == '存在'){
  echo "<script>alert('该订单号已经使用过了，当前无效！如有异议，请联系客服');</script>";
  }else{
  $file_path="scan.txt"; 
  $scan=file_get_contents($file_path); 
  $scan=str_replace("rn","<br/>",file_get_contents($file_path)); 
  fclose($fp); 
  $zsx = strpos($scan, $a) !== false ? '存在' : '不存在';
  if($zsx == '存在'){
  file_put_contents('bad.txt',$a, FILE_APPEND);
  echo "<script>alert('检测到支付宝充值成功，这里执行whmcs充值代码');</script>";
  }else{
  echo "<script>alert('订单号错误，如果充值成功后1分钟还是提示本消息，请联系客服');</script>";
  }
  }
}
?>
</div>
<p align="center">By:DongganBoy</p>
</body>
</html>