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

$query1 = "SELECT data FROM system_setting WHERE category='title'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_row($result1);

$query2 = "SELECT data FROM system_setting WHERE category='website_title'";
$result2 = mysql_query($query2);
$row2 = mysql_fetch_row($result2);

$query3 = "SELECT data FROM system_setting WHERE category='target_date'";
$result3 = mysql_query($query3);
$row3 = mysql_fetch_row($result3);

$query4 = "SELECT * FROM timetable_setting WHERE 1";
$result4 = mysql_query($query4);
$row4 = mysql_fetch_row($result4);

$query5 = "SELECT data FROM system_setting WHERE category='start_date'";
$result5 = mysql_query($query5);
$row5 = mysql_fetch_row($result5);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>커스터마이징 - 현우야 대학가자</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="form_query.php" method="post">
				<span class="contact100-form-title">
					Customizing Service
				</span>

				<div class="wrap-input100 validate-input" data-validate="Title is required">
					<label class="label-input100" for="name">Main Title</label>
					<input id="name" class="input100" type="text" name="mainTitle" placeholder="input main title" value="<?=$row1[0]?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Title is required">
					<label class="label-input100" for="name">HTML Title</label>
					<input id="name" class="input100" type="text" name="htmlTitle" placeholder="input main title" value="<?=$row2[0]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Date is required">
					<label class="label-input100" for="name">Start Date</label>
					<input id="name" class="input100" type="text" name="startDate" placeholder="input start date" value="<?=$row5[0]?>">
					<span class="focus-input100"></span>
        </div>
        
				<div class="wrap-input100 validate-input" data-validate = "Date is required">
					<label class="label-input100" for="name">Target Date</label>
					<input id="name" class="input100" type="text" name="targetDate" placeholder="input target date" value="<?=$row3[0]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
					<label class="label-input100" for="name">Monday Timetable</label>
					<input id="name" class="input100" type="text" name="MonTT" placeholder="input monday timetable" value="<?=$row4[0]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
					<label class="label-input100" for="name">Tuesday Timetable</label>
					<input id="name" class="input100" type="text" name="TueTT" placeholder="input tuesday timetable" value="<?=$row4[1]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
					<label class="label-input100" for="name">Wednesday Timetable</label>
					<input id="name" class="input100" type="text" name="WedTT" placeholder="input wednesday timetable" value="<?=$row4[2]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
					<label class="label-input100" for="name">Thursday Timetable</label>
					<input id="name" class="input100" type="text" name="ThuTT" placeholder="input thursday timetable" value="<?=$row4[3]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
					<label class="label-input100" for="name">Friday Timetable</label>
					<input id="name" class="input100" type="text" name="FriTT" placeholder="input friday timetable" value="<?=$row4[4]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
					<label class="label-input100" for="name">Saturday Timetable</label>
					<input id="name" class="input100" type="text" name="SatTT" placeholder="input saturday timetable" value="<?=$row4[5]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
					<label class="label-input100" for="name">Sunday Timetable</label>
					<input id="name" class="input100" type="text" name="SunTT" placeholder="input sunday timetable" value="<?=$row4[6]?>">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
					<label class="label-input100" for="name">Holiday Timetable</label>
					<input id="name" class="input100" type="text" name="HolTT" placeholder="input holiday timetable" value="<?=$row4[7]?>">
					<span class="focus-input100"></span>
				</div>

			<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						EDIT
					</button>
				</div>

			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
		$(".js-select2").each(function(){
			$(this).on('select2:open', function (e){
				$(this).parent().next().addClass('eff-focus-selection');
			});
		});
		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				$(this).parent().next().removeClass('eff-focus-selection');
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
