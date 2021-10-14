<!--
Website Title : 수.능.대.박
Developer : JoHyeonWoo
Date : 2018.08.13 - 2018.08.04
Hosting by : DOTHOME FREE WEB HOSTING

D-Day Count Source from :
    출처: http://bandi225.tistory.com/79 [언제나 청춘,]

DB Connection Source from :
    출처: http://e2xist.tistory.com/303 [언제나 초심.]

Header CSS Source from :
    https://zetawiki.com/wiki/HTML_div_3%EA%B0%9C_%EC%99%BC%EC%AA%BD-%EA%B0%80%EC%9A%B4%EB%8D%B0-%EC%98%A4%EB%A5%B8%EC%AA%BD_%EB%B0%B0%EC%97%B4

Charset Issue Solve :
    출처: http://ra2kstar.tistory.com/59 [초보개발자 이야기.]

Index Page Design Source from :
    http://html5up.net

Clock Design Source from :
    https://codepen.io/HughDai/pen/MKKXJp

Table Design Source from :
    https://codepen.io/anon/pen/ajxBVB

-->

<?php
// Pre-work
if($_GET['id'] == 'guest')
  $permission = 'guest';
else if($_GET['id'] == '1011')
  $permission = 'admin';
else if($_GET['id'] == '1005')
  $permission = 'admin';
else
  $permission = 'nothing';

if($permission == 'nothing'){
  echo "<script>alert('정상적인 비밀번호가 아닙니다.');</script>";
  echo "<script>history.back();</script>";
}

// DB Connection
include "./dbinfo.php";
$connect = @mysql_connect($mysql_hostname.':'.$mysql_port, $mysql_username, $mysql_password);

if(!$connect){
	echo '[연결실패] : '.mysql_error().'';
	die('MySQL 서버에 연결할 수 없습니다.');
}
@mysql_select_db($mysql_database, $connect) or die('DB 선택 실패');

mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

$s_query = "SELECT data FROM system_setting WHERE category='website_title'";
$s_result = mysql_query($s_query);
$s_row = mysql_fetch_row($s_result);

$s_query1 = "SELECT data FROM system_setting WHERE category='title'";
$s_result1 = mysql_query($s_query1);
$s_row1 = mysql_fetch_row($s_result1);

$s_query2 = "SELECT data FROM system_setting WHERE category='target_date'";
$s_result2 = mysql_query($s_query2);
$s_row2 = mysql_fetch_row($s_result2);

$s_date = $s_row2[0];
$s_realDate = date("Y-m-d",strtotime($s_date));

// D-Day Count Source
if($_GET['date'] == '')
  $nDate = date("Y-m-d",time()); // 오늘 날짜를 출력하겠지요?
else
  $nDate = $_GET['date'];
$valDate = $s_realDate; // 폼에서 POST로 넘어온 value 값('yyyy-mm-dd' 형식)
$leftDate = intval((strtotime($nDate)-strtotime($valDate)) / 86400); // 나머지 날짜값이 나옵니다.
$leftDateAbs = abs($leftDate);

$query1 = "SELECT view FROM date_view WHERE day='$leftDateAbs'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_assoc($result1);

?>

<HTML>
  <title><?=$s_row[0]?></title>
  <meta charset="utf-8">
  <style>
  @import url(//fonts.googleapis.com/earlyaccess/jejugothic.css);
  body{
    background-color: #FFBDDB;
  }
  </style>
  <head>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  </head>

<body>
  <style>
  #topper{
    margin-top:3px;
    margin-right: auto;
    width: 100%;
    height: 10px;
    display:block;
  }
  #topper a{
    text-align: right;
    font-family: 'Jeju Gothic';
    color:black;
    text-decoration: none;
  }
  #topper2{
    margin-top:3px;
    margin-right: auto;
    width: 100%;
    font-size: 2em;
    height: 40px;
  }
  #topper2 a{
    text-align: right;
    font-family: 'Jeju Gothic';
    color:black;
    text-decoration: none;
  }
  @media ( max-width: 1023px ){
    #topper{
      display: none;
    }
  }
  @media ( min-width: 1023px ){
    #topper2{
      display: none;
    }
  }
  </style>
<div id="topper">
  <form name="findform" action="query4.php" method="get">
    <input type="text" name="godate" style="width:20%; margin-left:75%" placeholder="원하는 날짜로 이동(yyyy-mm-dd 형식)"></input>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="button" style="width:4%" href="javascript:findform.submit();" value="탐색">
  </form>
</div>
<div id="topper2">
  <form name="findform2" action="query4.php" method="get">
    <input type="text" name="godate" style="width:55%; margin-left:36% ;font-size: 1em; height: 40px" placeholder="원하는 날짜로 이동(yyyy-mm-dd 형식)"></input>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="button" style="width:8% ; font-size: 1em; height: 40px" href="javascript:findform2.submit();" value="탐색">
  </form>
</div>

<style>
#header{
    height: 100px;
    margin-bottom: 25px;
    text-align: center;
    font-size: 100%;
    margin-top: 25px;
    margin-left: 1%;
    margin-right: 1%;
}
#left-box {
    width: 300px;
    height: 100px;
    background-color: #FFD6EF;
    float: left;
    line-height: 1.2;
}
#center-box {
    height: 100px;
    line-height: 100px;
    background-color: #EBA0B6;
    margin: 0 auto;
    font-size:3em; font-family: 'Jeju Gothic'; color:black
}
#right-box {
    height: 100px;
    line-height: 100px;
    width: 300px;
    background-color: #FFD6EF;
    float: right;
}
@media ( max-width: 1050px ) {
  #center-box { font-size:2em; }
}

</style>
<div id="header">
  <div id="left-box">
    <font style="font-size:4em; font-family:'Jeju Gothic'; color:black"><?echo "D - ".$leftDateAbs;?></font><br>
    <font style="font-size:1em; font-family:'Jeju Gothic'; color:black"><?echo $row1['view'];?></font>
  </div>
  <div id="right-box">
    <font style="font-size:3em; font-family: 'Jeju Gothic'; color:black"><?php echo $nDate;?></font>
  </div>
  <div id="center-box">
    <font><?=$s_row1[0]?></font>
  </div>
</div>

<style>
#wrapper {
    height: 450px;
    text-align: center;
    font-family: 'Jeju Gothic';
}
#left-box1 {
    width: 70%;
    text-align:right;
    font-size: 1.7em;
    color:black;
    float: left;
}
#center-box1 {
    margin: 0 auto;
    text-align: left;
    font-size:1.7em;
    margin-left:5px;
}
#right-box1 {
    width: 300px;
    float: right;
}
@media ( max-width: 1023px ) {
  #left-box1 { width:100%; }
  #clockshow { display:none; }
  #left-box2 { display:none; }
  #right-box2 { display:none; }
  #left-box3 { display:none; }
}
@media ( min-width: 1023px ) {
  #left-box20 { display:none; }
  #right-box20 { display:none; }
  #left-box30 { display:none; }
}

.css-input {
     padding: 1px;
     font-size: 24px;
     font-family: 'Jeju Gothic';
     width: 60%;
     border-width: 0px;
     border-color: #e2cbcb;
     background-color: #FFD6EF;
     color:black;
     border-style: solid;
     border-radius: 0px;
     margin-bottom: 8.2px;
     box-shadow: 0px 0px 5px rgba(66,66,66,.75);
     /*text-shadow: 0px 0px 5px rgba(66,66,66,.75); */
}
 .css-input:focus {
     outline:none;
}

@import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css);
@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);

body {
    font-family: 'Lato', sans-serif;

    color: #FFD6EF;
}
.jumbotron h1 {
    color: #353535;
}
footer {
  margin-bottom: 0 !important;
  margin-top: 80px;
}
footer p {
  margin: 0;
  padding: 0;
}
span.icon {
    margin: 0 5px;
    color: #D64541;
}
h2 {
    color: #BDC3C7;
  text-transform: uppercase;
  letter-spacing: 1px;
}
.mrng-60-top {
    margin-top: 30px;
}
/* Global Button Styles */
a.animated-button:link, a.animated-button:visited {
    position: relative;
    display: block;
    margin: 10px auto 0;
    padding: 14px 15px;
    color: #FFF;
    font-size:14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    letter-spacing: .08em;
    border-radius: 0;
    text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    transition: all 1s ease;
}
a.animated-button:link:after, a.animated-button:visited:after {
    content: "";
    position: absolute;
    height: 0%;
    left: 50%;
    top: 50%;
    width: 150%;
    z-index: -1;
    -webkit-transition: all 0.75s ease 0s;
    -moz-transition: all 0.75s ease 0s;
    -o-transition: all 0.75s ease 0s;
    transition: all 0.75s ease 0s;
}
a.animated-button:link:hover, a.animated-button:visited:hover {
    color: #FFF;
    text-shadow: none;
}
a.animated-button:link:hover:after, a.animated-button:visited:hover:after {
    height: 450%;
}
a.animated-button:link, a.animated-button:visited {
    position: relative;
    display: block;
    margin: 10px auto 0;
    padding: 10px 15px;
    color: #EBA0B6;
    font-size:14px;
    border-radius: 0;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    letter-spacing: .08em;
    text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    transition: all 1s ease;
}

/* Victoria Buttons */

a.animated-button.victoria-one {
    border: 2px solid #FFD6EF;
}
a.animated-button.victoria-one:after {
    background: #EBA0B6;
    -moz-transform: translateX(-50%) translateY(-50%) rotate(-25deg);
    -ms-transform: translateX(-50%) translateY(-50%) rotate(-25deg);
    -webkit-transform: translateX(-50%) translateY(-50%) rotate(-25deg);
    transform: translateX(-50%) translateY(-50%) rotate(-25deg);
}

</style>
<?
$query2 = "SELECT work FROM daily_work WHERE date='$leftDateAbs' ORDER BY daily_work.number ASC";
$result2 = mysql_query($query2);
$total = mysql_num_rows($result2);
for($i=0;$i<$total;$i++){
  $tmp = mysql_fetch_array($result2);
  ${"resu".$i} = $tmp[0];
}

$query5 = "SELECT studytime FROM studytime WHERE day='$leftDateAbs'";
$tempDate = $leftDateAbs + 7;
$query6 = "SELECT studytime FROM studytime WHERE day='$tempDate'";
$result5 = mysql_query($query5);
$result6 = mysql_query($query6);
$row5 = mysql_fetch_row($result5);
$row6 = mysql_fetch_row($result6);


// 오늘이 공휴일인지 확인
$isholiday = '0';
$isholiday_query = "SELECT date FROM holiday";
$isholiday_result = mysql_query($isholiday_query);
$isholiday_num = mysql_num_rows($isholiday_result);
while($isholiday_num--){
  $isholiday_row = mysql_fetch_row($isholiday_result);
  if($nDate == $isholiday_row[0]){
    $isholiday = '1';
  }
}
// 최종값 출력
if($isholiday == '1'){
  $todayTimetable = 'hol';
}else{
  $todayDate = date('w',strtotime($nDate));
  switch($todayDate){
    case '0' : $todayTimetable = 'sun'; break;
    case '1' : $todayTimetable = 'mon'; break;
    case '2' : $todayTimetable = 'tue'; break;
    case '3' : $todayTimetable = 'wed'; break;
    case '4' : $todayTimetable = 'thu'; break;
    case '5' : $todayTimetable = 'fri'; break;
    case '6' : $todayTimetable = 'sat'; break;
  }
}

$ttt_query = "SELECT $todayTimetable from timetable_setting WHERE 1";
$ttt_result = mysql_query($ttt_query);
$ttt_row = mysql_fetch_row($ttt_result);
$ttt_row_res = $ttt_row[0];

$tt_query1 = "SELECT data FROM $ttt_row_res WHERE num='1'";
$tt_query2 = "SELECT data FROM $ttt_row_res WHERE num='2'";
$tt_query3 = "SELECT data FROM $ttt_row_res WHERE num='3'";
$tt_query4 = "SELECT data FROM $ttt_row_res WHERE num='4'";
$tt_query5 = "SELECT data FROM $ttt_row_res WHERE num='5'";
$tt_query6 = "SELECT data FROM $ttt_row_res WHERE num='6'";
$tt_query7 = "SELECT data FROM $ttt_row_res WHERE num='7'";
$tt_query8 = "SELECT data FROM $ttt_row_res WHERE num='8'";
$tt_query9 = "SELECT data FROM $ttt_row_res WHERE num='9'";
$tt_query10 = "SELECT data FROM $ttt_row_res WHERE num='10'";
$tt_result1 = mysql_query($tt_query1);
$tt_result2 = mysql_query($tt_query2);
$tt_result3 = mysql_query($tt_query3);
$tt_result4 = mysql_query($tt_query4);
$tt_result5 = mysql_query($tt_query5);
$tt_result6 = mysql_query($tt_query6);
$tt_result7 = mysql_query($tt_query7);
$tt_result8 = mysql_query($tt_query8);
$tt_result9 = mysql_query($tt_query9);
$tt_result10 = mysql_query($tt_query10);
$tt_row1 = mysql_fetch_row($tt_result1);
$tt_row2 = mysql_fetch_row($tt_result2);
$tt_row3 = mysql_fetch_row($tt_result3);
$tt_row4 = mysql_fetch_row($tt_result4);
$tt_row5 = mysql_fetch_row($tt_result5);
$tt_row6 = mysql_fetch_row($tt_result6);
$tt_row7 = mysql_fetch_row($tt_result7);
$tt_row8 = mysql_fetch_row($tt_result8);
$tt_row9 = mysql_fetch_row($tt_result9);
$tt_row10 = mysql_fetch_row($tt_result10);
?>
<div id="wrapper">
  <div id="left-box1">
    <form name="mainform" action="query.php" method="get">
      <tr>
      <tr>
        <td><?=$tt_row1[0]?></td>
        <td><input type="text" class="css-input" name="index0" value="<?=$resu0?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row2[0]?></td>
        <td><input type="text" class="css-input" name="index1" value="<?=$resu1?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row3[0]?></td>
        <td><input type="text" class="css-input" name="index2" value="<?=$resu2?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row4[0]?></td>
        <td><input type="text" class="css-input" name="index3" value="<?=$resu3?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row5[0]?></td>
        <td><input type="text" class="css-input" name="index4" value="<?=$resu4?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row6[0]?></td>
        <td><input type="text" class="css-input" name="index5" value="<?=$resu5?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row7[0]?></td>
        <td><input type="text" class="css-input" name="index6" value="<?=$resu6?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row8[0]?></td>
        <td><input type="text" class="css-input" name="index7" value="<?=$resu7?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row9[0]?></td>
        <td><input type="text" class="css-input" name="index8" value="<?=$resu8?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
      <tr>
        <td><?=$tt_row10[0]?></td>
        <td><input type="text" class="css-input" name="index9" value="<?=$resu9?>" <?if($permission=='guest') echo 'readonly';?>></td>
      </tr><br>
    </tr>
    <input type="hidden" name="leftDateAbs" value="<?=$leftDateAbs?>">
    <input type="hidden" name="permission" value="<?=$permission?>">
    <?if($permission == 'admin'){ ?>
    <div class="col-md-3 col-sm-3 col-xs-6"> <a href="javascript:mainform.submit();" class="btn btn-sm animated-button victoria-one">EDIT</a> </div>
  <? }else if($permission == 'guest'){} ?>

  </input>
  </form>
  </div>
  <div id="right-box1">
    <div id="clockshow">
      <style id="clock-animations"></style>
    <div>
      <link rel="stylesheet" href="css/style.css">
      <div class="clock-wrapper">
            <div class="clock-base">
                <div class="click-indicator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="clock-hour"></div>
                <div class="clock-minute"></div>
                <div class="clock-second"></div>
                <div class="clock-center"></div>
            </div>
        </div>
      </div>
      <script src="js"></script>
    </div>
    <div id="left-box2">
      <form name="subform" action="query2.php" method="get">
        <div>
        <tr>
          <td>데일리 </td>
          <td><input type="text" class="css-input1" name="studytime1" value="<?=$row5[0]?>" <?if($permission=='guest') echo 'readonly';?>></td>
        </tr><br>
        <tr>
          <td>지난주 </td>
          <td><input type="text" class="css-input1" name="studytime2" value="<?=$row6[0]?>" readonly></td>
        </tr><br>
      </div>

      <input type="hidden" name="leftDateAbs" value="<?=$leftDateAbs?>">
      <input type="hidden" name="permission" value="<?=$permission?>">
      <?if($permission == 'admin'){ ?>
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="javascript:subform.submit();" class="btn btn-sm animated-button victoria-one">EDIT</a> </div>
    <? }else if($permission == 'guest'){} ?>

    </input>
    </form>
    </div>
  </div>
  <div id="center-box1">

  </div>
</div>
<div id="left-box20">
  <form name="subform2" action="query2.php" method="get">
    <div>
    <tr>
      <td>오늘의 학습시간 </td>
    </tr><br>
    <tr>
      <td><input type="text" class="css-input10" name="studytime1" value="<?=$row5[0]?>" <?if($permission=='guest') echo 'readonly';?>></td>
    </tr><br><br>
    <tr>
      <td>지난주 학습시간 </td>
    </tr><br>
    <tr>
      <td><input type="text" class="css-input10" name="studytime2" value="<?=$row6[0]?>" readonly></td>
    </tr><br>
  </div>

  <input type="hidden" name="leftDateAbs" value="<?=$leftDateAbs?>">
  <input type="hidden" name="permission" value="<?=$permission?>">
  <?if($permission == 'admin'){ ?>
  <div class="col-md-3 col-sm-3 col-xs-6"> <a href="javascript:subform2.submit();" class="btn btn-sm animated-button victoria-one">EDIT</a> </div>
<? }else if($permission == 'guest'){} ?>

</input>
</form>
</div>
<style>
#wrapper2 {
    overflow: hidden;
    height: auto;
    text-align: center;
    font-family: 'Jeju Gothic';
    width:100%;
}
#left-box2 {
    margin-top: 280px;
    margin-left: 0px;
    width: 100%;
    text-align:left;
    font-size: 1.3em;
    color:black;
    float: left;
}
#left-box20 {
    margin-left: 0px;
    width: 100%;
    text-align:center;
    font-size: 45px;
    font-family: 'Jeju Gothic';
    color:black;
    float: left;
}
#left-box3 {
    margin-left: 0px;
    width: 49%;
    text-align:left;
    font-size: 1.3em;
    color:black;
    float: left;
}
#center-box2 {
    margin-top:10px;
    margin: 0 auto;
    text-align: left;
    font-size:1.7em;
    margin-left:5px;
}
#right-box2 {
    margin-top:10px;
    width: 49%;
    float: right;
}
.css-input1 {
     padding: 8px;
     font-size: 30px;
     font-family: 'Jeju Gothic';
     width: 70%;
     text-align: center;
     border-width: 0px;
     border-color: #e2cbcb;
     background-color: #EBA0B6;
     color:black;
     border-style: solid;
     border-radius: 10px;
     margin-bottom: 7px;
     box-shadow: 0px 0px 5px rgba(66,66,66,.75);
    /* text-shadow: 0px 0px 5px rgba(66,66,66,.75); */
}
 .css-input:focus {
     outline:none;
}
.css-input10 {
     padding: 8px;
     font-size: 55px;
     font-family: 'Jeju Gothic';
     width: 50%;
     text-align: center;
     border-width: 0px;
     border-color: #e2cbcb;
     background-color: #EBA0B6;
     color:black;
     border-style: solid;
     border-radius: 10px;
     margin-bottom: 7px;
     box-shadow: 0px 0px 5px rgba(66,66,66,.75);
  /*   text-shadow: 0px 0px 5px rgba(66,66,66,.75); */
}
</style>


<div id="wrapper2">
  <div id="left-box3">
    <div>
      <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

    body {
      font-family: "Roboto", helvetica, arial, sans-serif;
      font-size: 16px;
      font-weight: 400;
      text-rendering: optimizeLegibility;
    }

    div.table-title {
       display: block;
      margin: auto;
      max-width: 600px;
      padding:5px;
      width: 100%;
    }

    .table-title h3 {
       color: #fafafa;
       font-size: 30px;
       font-weight: 400;
       font-style:normal;
       font-family:'Jeju Gothic';
       text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
       text-transform:uppercase;
    }


    /*** Table Styles **/

    .table-fill {
      background: white;
      border-radius:3px;
      border-collapse: collapse;
      height: 320px;
      margin: auto;
      max-width: 600px;
      padding:5px;
      width: 100%;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      animation: float 5s infinite;
    }

    th {
      color:#D5DDE5;;
      background:#1b1e24;
      border-bottom:4px solid #9ea7af;
      border-right: 1px solid #343a45;
      font-size:23px;
      font-weight: 100;
      padding:15px;
      text-align:left;
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      vertical-align:middle;
    }

    th:first-child {
      border-top-left-radius:3px;
    }

    th:last-child {
      border-top-right-radius:3px;
      border-right:none;
    }

    tr {
      border-top: 1px solid #C1C3D1;
      border-bottom-: 1px solid #C1C3D1;
      color:#666B85;
      font-size:16px;
      font-weight:normal;
      text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
    }

    tr:hover td {
      background:#4E5066;
      color:blackFFF;
      border-top: 1px solid #22262e;
    }

    tr:first-child {
      border-top:none;
    }

    tr:last-child {
      border-bottom:none;
    }

    tr:nth-child(odd) td {
      background:#EBEBEB;
    }

    tr:nth-child(odd):hover td {
      background:#4E5066;
    }

    tr:last-child td:first-child {
      border-bottom-left-radius:3px;
    }

    tr:last-child td:last-child {
      border-bottom-right-radius:3px;
    }

    td {
      background:#FFFFFF;
      padding:12px;
      text-align:left;
      vertical-align:middle;
      font-weight:300;
      font-size:18px;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      border-right: 1px solid #C1C3D1;
    }

    td:last-child {
      border-right: 0px;
    }

    th.text-left {
      text-align: center;
    }

    th.text-center {
      text-align: center;
    }

    th.text-right {
      text-align: right;
    }

    td.text-left {
      text-align: center;
    }

    td.text-center {
      text-align: center;
    }

    td.text-right {
      text-align: right;
    }

    </style>
    <div class="table-title">
      <h3 style="text-align:center ; color:black">< 학습시간 기록 ></h3>
    </div>
    <table class="table-fill">
    <thead>
      <tr>
        <th class="text-left">D-Day</th>
        <th class="text-left">Study Time</th>
      </tr>
    </thead>
    <tbody class="table-hover">
      <?
        $sd_query = "SELECT data FROM system_setting WHERE category='start_date'";
        $sd_result = mysql_query($sd_query);
        $sd_row = mysql_fetch_row($sd_result);
        $nDate2 = $sd_row[0];
        $leftDate2 = intval((strtotime($nDate2)-strtotime($valDate)) / 86400); // 나머지 날짜값이 나옵니다.
        $leftDateAbs2 = abs($leftDate2) + 1;

        for($i=$leftDateAbs+1;$i<$leftDateAbs2;$i++){
          $query7 = "SELECT studytime FROM studytime WHERE day='$i'";
          $result7 = mysql_query($query7);
          $row7 = mysql_fetch_array($result7);
          $temp = $row7[0];
          echo "<tr>";
          echo "<td class=\"text-left\">D-$i</td>";
          echo "<td class=\"text-left\">$temp</td>";
          echo "</tr>";
        }
      ?>

    </tbody>
    </table>


    </div>
  </div>
  <div id="right-box2">
    <div class="table-title">
      <h3 style="text-align:center ; color:black">< 메모장 ></h3>
    </div>
    <?
      $query9 = "SELECT notepad FROM notepad";
      $result9 = mysql_query($query9);
      $row9 = mysql_fetch_array($result9);
    ?>
    <form name="sub2form" action="query3.php" method="get">
    <textarea name="notepad" cols="46" rows="15" style="font-size:1.5em ; font-family:'Jeju Gothic'" <?if($permission=='guest') echo 'readonly';?>><?=$row9[0];?></textarea>
    <script src='js/autosize.js'></script>
    <script>autosize(document.querySelectorAll('textarea'));</script>
    <input type="hidden" name="leftDateAbs" value="<?=$leftDateAbs?>">
    <input type="hidden" name="permission" value="<?=$permission?>">
    <?if($permission == 'admin'){ ?>
    <div class="col-md-3 col-sm-3 col-xs-6"> <a href="javascript:sub2form.submit();" class="btn btn-sm animated-button victoria-one">EDIT</a> </div>
  <? }else if($permission == 'guest'){} ?>
</form>
  </div>
  <div id="center-box2">

  </div>
</div>

<div id="left-box30">
  <div>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

  body {
    font-family: "Roboto", helvetica, arial, sans-serif;
    font-size: 16px;
    font-weight: 400;
    text-rendering: optimizeLegibility;
  }

  div.table-title {
    display: block;
    margin: auto;
    max-width: 600px;
    padding:5px;
    width: 100%;
  }

  .table-title h3 {
     color: #fafafa;
     font-size: 30px;
     font-weight: 400;
     font-style:normal;
     font-family:'Jeju Gothic';
     text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
     text-transform:uppercase;
  }


  /*** Table Styles **/

  .table-fill {
    background: white;
    border-radius:3px;
    border-collapse: collapse;
    height: 320px;
    margin: auto;
    max-width: 600px;
    padding:5px;
    width: 100%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    animation: float 5s infinite;
  }

  th {
    color:#D5DDE5;;
    background:#1b1e24;
    border-bottom:4px solid #9ea7af;
    border-right: 1px solid #343a45;
    font-size:23px;
    font-weight: 100;
    padding:15px;
    text-align:left;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    vertical-align:middle;
  }

  th:first-child {
    border-top-left-radius:3px;
  }

  th:last-child {
    border-top-right-radius:3px;
    border-right:none;
  }

  tr {
    border-top: 1px solid #C1C3D1;
    border-bottom-: 1px solid #C1C3D1;
    color:#666B85;
    font-size:16px;
    font-weight:normal;
    text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
  }

  tr:hover td {
    background:#4E5066;
    color:blackFFF;
    border-top: 1px solid #22262e;
  }

  tr:first-child {
    border-top:none;
  }

  tr:last-child {
    border-bottom:none;
  }

  tr:nth-child(odd) td {
    background:#EBEBEB;
  }

  tr:nth-child(odd):hover td {
    background:#4E5066;
  }

  tr:last-child td:first-child {
    border-bottom-left-radius:3px;
  }

  tr:last-child td:last-child {
    border-bottom-right-radius:3px;
  }

  td {
    background:#FFFFFF;
    padding:12px;
    text-align:left;
    vertical-align:middle;
    font-weight:300;
    font-size:18px;
    text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
    border-right: 1px solid #C1C3D1;
  }

  td:last-child {
    border-right: 0px;
  }

  th.text-left {
    text-align: center;
  }

  th.text-center {
    text-align: center;
  }

  th.text-right {
    text-align: right;
  }

  td.text-left2 {
    text-align: center;
  }

  td.text-center {
    text-align: center;
  }

  td.text-right {
    text-align: right;
  }

  @media ( max-width: 1023px ){
      td {
        font-size:40px;
      }
      th{
        font-size:45px;
      }
      .table-fill{
        max-width: 80%;
      }
      .table-title h3{
        font-size: 50px;
      }
  }

  </style>
  <div class="table-title">
    <h3 style="text-align:center ; color:black">< 학습시간 기록 ></h3>
  </div>
  <table class="table-fill">
  <thead>
    <tr>
      <th class="text-left2">D-Day</th>
      <th class="text-left2">Study Time</th>
    </tr>
  </thead>
  <tbody class="table-hover">
    <?
      for($i=$leftDateAbs+1;$i<105;$i++){
        $query7 = "SELECT studytime FROM studytime WHERE day='$i'";
        $result7 = mysql_query($query7);
        $row7 = mysql_fetch_array($result7);
        $temp = $row7[0];
        echo "<tr>";
        echo "<td class=\"text-left\">D-$i</td>";
        echo "<td class=\"text-left\">$temp</td>";
        echo "</tr>";
      }
    ?>

  </tbody>
  </table>


  </div>
</div>
<div id="right-box20">
  <div class="table-title">
    <h3 style="text-align:center ; size:50px ; color:black">< 메모장 ></h3>
  </div>
  <?
    $query9 = "SELECT notepad FROM notepad";
    $result9 = mysql_query($query9);
    $row9 = mysql_fetch_array($result9);
  ?>
  <form name="sub20form" action="query3.php" method="get">
  <textarea name="notepad" style="font-size:2.5em ; width:80% ; margin-left: 10%; font-family:'Jeju Gothic'" <?if($permission=='guest') echo 'readonly';?>><?=$row9[0];?></textarea>
  <script src='js/autosize.js'></script>
  <script>autosize(document.querySelectorAll('textarea'));</script>
  <input type="hidden" name="leftDateAbs" value="<?=$leftDateAbs?>">
  <input type="hidden" name="permission" value="<?=$permission?>">
  <?if($permission == 'admin'){ ?>
  <div class="col-md-3 col-sm-3 col-xs-6"> <a href="javascript:sub20form.submit();" class="btn btn-sm animated-button victoria-one">EDIT</a> </div>
<? }else if($permission == 'guest'){} ?>
</form>
</div>

<style>
#subpages {
  height:auto;
  width:100%;
  margin-top:50px;
  overflow: hidden;
}
#subTimer {
  height:100px;
  background-color: #EBA0B6;
  margin-left: 1%;
  margin-right: 1%;
  width:98%;
  font-family:'Jeju Gothic';
  font-size:2.5em;
  text-align:center;
}
</style>
<div id="subpages">
  <a href="subpages/index.php" style="text-decoration:none ; color:black ; margin-top:30px">
    <div id="subTimer">
      <p><font style="font-size:0.7em"><br></font>모의고사 타이머 서비스</p>
    </div>
  </a>
  <a href="subpages/customizing/index.php" style="text-decoration:none ; color:black ; margin-top:30px">
    <div id="subTimer" <?if($permission=='guest') echo "style=\"display:none\""?>>
      <p><font style="font-size:0.7em"><br></font>커스터마이징 서비스</p>
    </div>
  </a>
</div>

<style>
#last {
  display : block;
  margin-top: 30px;
  background-color: #FFD6EF;
  font-family: 'Jeju Gothic';
  font-size: 1em;
  text-align: center;
  color:black;
}
@media ( max-width: 1023px ) {
  #last { font-size:0.6em; }
}

</style>
<div id='last'>
  <br>
  <p>개발자 : 조현우</p>
  <p>개발일시 : 2018.08.13 - 2018.08.14</p>
  <p>본 사이트는 닷홈 무료 호스팅을 통해 제공되고 있습니다.</p>
  <p>본 사이트는 크롬 브라우저, 1280*720 해상도에 최적화되어 있습니다.</p>
  <p>[저작권 표시] D-Day Count Source from : 출처: http://bandi225.tistory.com/79 [언제나 청춘,],
    DB Connection Source from : 출처: http://e2xist.tistory.com/303 [언제나 초심.],
    Header CSS Source from : https://zetawiki.com/wiki/HTML_div_3개_왼쪽-가운데-오른쪽_배열
    Charset Issue Solve : 출처: http://ra2kstar.tistory.com/59 [초보개발자 이야기.]
    Index Page Design Source from : http://html5up.net
    Clock Design Source from : https://codepen.io/HughDai/pen/MKKXJp
    Table Design Source from : https://codepen.io/anon/pen/ajxBVB</p>
    <br>
</div>

</body>
<!-- EOF -->
