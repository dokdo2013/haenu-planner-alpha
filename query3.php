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
  $notepad = $_GET['notepad'];
  $query8 = "UPDATE notepad SET notepad='$notepad' WHERE num='0'";
  $result8 = mysql_query($query8);
}
?>
<script>
history.back();
</script>
