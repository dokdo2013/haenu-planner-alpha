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

  $index0 = $_GET['index0'];
  $index1 = $_GET['index1'];
  $index2 = $_GET['index2'];
  $index3 = $_GET['index3'];
  $index4 = $_GET['index4'];
  $index5 = $_GET['index5'];
  $index6 = $_GET['index6'];
  $index7 = $_GET['index7'];
  $index8 = $_GET['index8'];
  $index9 = $_GET['index9'];
  $leftDateAbs = $_GET['leftDateAbs'];

  $query3 = "SELECT work FROM daily_work WHERE date='$leftDateAbs' ORDER BY daily_work.number ASC";
  $result3 = mysql_query($query3);
  $total = mysql_num_rows($result3);
  for($i=0;$i<$total;$i++){
    $temp = ${"index".$i};
    $query4 = "UPDATE daily_work SET work='$temp' WHERE date='$leftDateAbs' and number='$i'";
    $result4 = mysql_query($query4);
  }
}
?>
<script>
history.back();
</script>
