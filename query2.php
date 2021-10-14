<meta charset="UTF-8">
<?
if($_GET['permission'] == 'guest'){
  echo "<script>alert('수정 권한이 없습니다.');</script>";
}else{

include "./dbinfo.php";
$connect = @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password);

if(!$connect){
  echo '[연결실패] : '.mysql_error().'';
  die('MySQL 서버에 연결할 수 없습니다.');
}
@mysql_select_db($mysql_database, $connect) or die('DB 선택 실패');
mysql_query(' SET NAMES '.$mysql_charset);

mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

  $leftDateAbs = $_GET['leftDateAbs'];
  $data = $_GET['studytime1'];
  $query7 = "UPDATE studytime SET studytime='$data' WHERE day='$leftDateAbs'";
  $result7 = mysql_query($query7);
}
?>
<script>
history.back();
</script>
