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
  <p align="center">WHMCS��email�˻�:
    <input name="emailid" type="text" id="emailid" />
*</p>
  <p align="center">�˻����飬��Ҫ����</p>
  <p align="center"><strong>��������뵽С�������λ������:<span class="STYLE1">9.10</span>��<span class="STYLE1">8.00</span>��<span class="STYLE1">20.00</span>��<span class="STYLE1">18.91</span>��<span class="STYLE1">0.10</span></strong></p>
  <div align="center">
    <input name="submit" type="submit" value="�ύ" />
  </div>
</form>
<div align="center">
<?php
$mysqlip="localhost";
$mysqluser="bb";
$mysqlpassword="10015453265";
$mysqldatabase="bb";

if($_POST["submit"]=="�ύ"){
  echo "������Ķ�����Ϊ��".$_POST["ddh"]."&nbsp;&nbsp;���Ϊ��".$_POST["je"];
  $email=$_POST["emailid"];
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
  echo "<script>alert('��⵽֧������ֵ�ɹ���whmcs׼����ʼ��ֵ');</script>";
  $con = mysql_connect($mysqlip,$mysqluser,$mysqlpassword);
  if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db($mysqldatabase, $con);
$result = mysql_query("SELECT * FROM tblclients
WHERE email='$email'");
  while($row = mysql_fetch_array($result))
  {
  $old= $row['credit'];
  }
  $new=$_POST["je"];
  $new=$old + $new;
  mysql_query("UPDATE tblclients SET credit = $new
  WHERE email = '$email'");
  
  $result = mysql_query("SELECT * FROM tblclients
WHERE email='$email'");
  while($row = mysql_fetch_array($result))
  {
  $okold= $row['credit'];
  }
  if ($okold == $new ){
	  file_put_contents('bad.txt',$a, FILE_APPEND);
		echo "<script>alert('��ֵ���');</script>";
  }else{
	  echo "<script>alert('��ֵʧ�ܣ������ʼ��Ƿ����');</script>";
  }
    
  mysql_close($con);

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