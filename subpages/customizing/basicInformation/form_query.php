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

$data1 = $_POST['mainTitle'];
$data2 = $_POST['htmlTitle'];
$data3 = $_POST['targetDate'];
$data4 = $_POST['MonTT'];
$data5 = $_POST['TueTT'];
$data6 = $_POST['WedTT'];
$data7 = $_POST['ThuTT'];
$data8 = $_POST['FriTT'];
$data9 = $_POST['SatTT'];
$data10 = $_POST['SunTT'];
$data11 = $_POST['HolTT'];
$data12 = $_POST['startDate'];

$query1 = "UPDATE system_setting SET data='$data1' WHERE category='title'";
$query2 = "UPDATE system_setting SET data='$data2' WHERE category='website_title'";
$query3 = "UPDATE system_setting SET data='$data3' WHERE category='target_date'";
$query4 = "UPDATE timetable_setting SET mon='$data4' WHERE 1";
$query5 = "UPDATE timetable_setting SET tue='$data5' WHERE 1";
$query6 = "UPDATE timetable_setting SET wed='$data6' WHERE 1";
$query7 = "UPDATE timetable_setting SET thu='$data7' WHERE 1";
$query8 = "UPDATE timetable_setting SET fri='$data8' WHERE 1";
$query9 = "UPDATE timetable_setting SET sat='$data9' WHERE 1";
$query10 = "UPDATE timetable_setting SET sun='$data10' WHERE 1";
$query11 = "UPDATE timetable_setting SET hol='$data11' WHERE 1";
$query12 = "UPDATE system_setting SET data='$data12' WHERE category='start_date'";

$result1 = mysql_query($query1);
$result2 = mysql_query($query2);
$result3 = mysql_query($query3);
$result4 = mysql_query($query4);
$result5 = mysql_query($query5);
$result6 = mysql_query($query6);
$result7 = mysql_query($query7);
$result8 = mysql_query($query8);
$result9 = mysql_query($query9);
$result10 = mysql_query($query10);
$result11 = mysql_query($query11);
$result12 = mysql_query($query12);

?>
<script>
history.back();
</script>
