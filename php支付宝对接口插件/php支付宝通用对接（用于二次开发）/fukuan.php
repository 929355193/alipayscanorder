<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>֧����-��ֵҳ��</title>
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
<p align="center" class="STYLE1"><strong>ɨ���ֵ��Ϻ�ϵͳ��̨������Ҫ1���ӣ���������1����֮����������������</strong></p>
<form name="form1" action="" method="post">
  <p align="center">������:
    <input type="text" name="ddh" />
  *</p>
  <p align="center">��&nbsp;&nbsp;��:
    <input type="text" name="je" />
  *</p>
  <p align="center"><strong>��������뵽С�������λ������:<span class="STYLE1">9.10</span>��<span class="STYLE1">8.00</span>��<span class="STYLE1">20.00</span>��<span class="STYLE1">18.91</span>��<span class="STYLE1">0.10</span></strong></p>
  <div align="center">
    <input name="submit" type="submit" value="�ύ" />
  </div>
</form>
<div align="center">
<?php
if($_POST["submit"]=="�ύ"){
  echo "������Ķ�����Ϊ��".$_POST["ddh"]."&nbsp;&nbsp;���Ϊ��".$_POST["je"];
  $a="[".$_POST["ddh"]."]----[".$_POST["je"]."]";
  $file_path="bad.txt"; 
  $bad=file_get_contents($file_path); 
  $bad=str_replace("rn","<br/>",file_get_contents($file_path)); 
  fclose($fp); 
  $ed = strpos($bad, $a) !== false ? '����' : '������';	
  if($ed == '����'){
  echo "<script>alert('�ö������Ѿ�ʹ�ù��ˣ���ǰ��Ч���������飬����ϵ�ͷ�');</script>";
  }else{
  $file_path="scan.txt"; 
  $scan=file_get_contents($file_path); 
  $scan=str_replace("rn","<br/>",file_get_contents($file_path)); 
  fclose($fp); 
  $zsx = strpos($scan, $a) !== false ? '����' : '������';
  if($zsx == '����'){
  file_put_contents('bad.txt',$a, FILE_APPEND);
  echo "<script>alert('��⵽֧������ֵ�ɹ�������ִ��whmcs��ֵ����');</script>";
  }else{
  echo "<script>alert('�����Ŵ��������ֵ�ɹ���1���ӻ�����ʾ����Ϣ������ϵ�ͷ�');</script>";
  }
  }
}
?>
</div>
<p align="center">By:DongganBoy</p>
</body>
</html>