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


$query1 = "INSERT INTO daily_work(date,number,work) VALUES ('105','0','')";
mysql_query($query1);
$query2 = "INSERT INTO daily_work(date,number,work) VALUES ('105','1','')";
mysql_query($query2);
$query3 = "INSERT INTO daily_work(date,number,work) VALUES ('105','2','')";
mysql_query($query3);
$query4 = "INSERT INTO daily_work(date,number,work) VALUES ('105','3','')";
mysql_query($query4);
$query1 = "INSERT INTO daily_work(date,number,work) VALUES ('105','4','')";
mysql_query($query1);
$query2 = "INSERT INTO daily_work(date,number,work) VALUES ('105','5','')";
mysql_query($query2);
$query3 = "INSERT INTO daily_work(date,number,work) VALUES ('105','6','')";
mysql_query($query3);
$query4 = "INSERT INTO daily_work(date,number,work) VALUES ('105','7','')";
mysql_query($query4);
$query2 = "INSERT INTO daily_work(date,number,work) VALUES ('105','8','')";
mysql_query($query2);
$query3 = "INSERT INTO daily_work(date,number,work) VALUES ('105','9','')";
mysql_query($query3);
?>
