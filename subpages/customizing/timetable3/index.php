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

for($i=1;$i<=10;$i++){
  ${'query'.$i} = "SELECT data FROM timetable3 WHERE num='$i'";
  ${'result'.$i} = mysql_query(${'query'.$i});
  ${'row'.$i} = mysql_fetch_row(${'result'.$i});
}

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

				<div class="wrap-input100 validate-input" data-validate="Fill in the blank">
					<label class="label-input100" for="name">1st period</label>
					<input id="name" class="input100" type="text" name="period1" placeholder="input 1st period" value="<?=$row1[0]?>">
					<span class="focus-input100"></span>
				</div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
					<label class="label-input100" for="name">2nd period</label>
					<input id="name" class="input100" type="text" name="period2" placeholder="input 2nd period" value="<?=$row2[0]?>">
					<span class="focus-input100"></span>
				</div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
          <label class="label-input100" for="name">3rd period</label>
          <input id="name" class="input100" type="text" name="period3" placeholder="input 3rd period" value="<?=$row3[0]?>">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
          <label class="label-input100" for="name">4th period</label>
          <input id="name" class="input100" type="text" name="period4" placeholder="input 4th period" value="<?=$row4[0]?>">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
					<label class="label-input100" for="name">5th period</label>
					<input id="name" class="input100" type="text" name="period5" placeholder="input 5th period" value="<?=$row5[0]?>">
					<span class="focus-input100"></span>
				</div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
          <label class="label-input100" for="name">6th period</label>
          <input id="name" class="input100" type="text" name="period6" placeholder="input 6th period" value="<?=$row6[0]?>">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
          <label class="label-input100" for="name">7th period</label>
          <input id="name" class="input100" type="text" name="period7" placeholder="input 7th period" value="<?=$row7[0]?>">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
          <label class="label-input100" for="name">8th period</label>
          <input id="name" class="input100" type="text" name="period8" placeholder="input 8th period" value="<?=$row8[0]?>">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
          <label class="label-input100" for="name">9th period</label>
          <input id="name" class="input100" type="text" name="period9" placeholder="input 9th period" value="<?=$row9[0]?>">
          <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Fill in the blank">
          <label class="label-input100" for="name">10th period</label>
          <input id="name" class="input100" type="text" name="period10" placeholder="input 10th period" value="<?=$row10[0]?>">
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
