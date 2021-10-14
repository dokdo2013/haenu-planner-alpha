<?
$id = $_GET['id'];
$godate = $_GET['godate'];

header("Location: http://dokdo2013.dothome.co.kr/main.php?id=$id&date=$godate", true, 301);
exit();

?>
