<meta charset="UTF-8">
<?
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

$data1 = $_POST['period1'];
$data2 = $_POST['period2'];
$data3 = $_POST['period3'];
$data4 = $_POST['period4'];
$data5 = $_POST['period5'];
$data6 = $_POST['period6'];
$data7 = $_POST['period7'];
$data8 = $_POST['period8'];
$data9 = $_POST['period9'];
$data10 = $_POST['period10'];

$query1 = "UPDATE timetable3 SET data='$data1' WHERE num='1'";
$query2 = "UPDATE timetable3 SET data='$data2' WHERE num='2'";
$query3 = "UPDATE timetable3 SET data='$data3' WHERE num='3'";
$query4 = "UPDATE timetable3 SET data='$data4' WHERE num='4'";
$query5 = "UPDATE timetable3 SET data='$data5' WHERE num='5'";
$query6 = "UPDATE timetable3 SET data='$data6' WHERE num='6'";
$query7 = "UPDATE timetable3 SET data='$data7' WHERE num='7'";
$query8 = "UPDATE timetable3 SET data='$data8' WHERE num='8'";
$query9 = "UPDATE timetable3 SET data='$data9' WHERE num='9'";
$query10 = "UPDATE timetable3 SET data='$data10' WHERE num='10'";

for($i=1;$i<=10;$i++){
  ${'result'.$i} = mysql_query(${'query'.$i});
}

?>
<script>
history.back();
</script>
