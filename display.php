<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Billplz Plugin/Module/Extension</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron well">
				<h2>
					Sumbangan Diterima!
				</h2>
				<p>
					Kami mengucapkan ribuan Terima Kasih diatas sumbangan yang diberikan. Sumbangan anda amat kami hargai untuk tujuan pembinaan Plugin/Module/Extension untuk pelbagai CMS. Kami sentiasa membuat kemaskini untuk plugin yang kami sediakan. Selain itu, kami juga akan terus membuat lebih banyak Plugin/Module/Extension bagi CMS yang lain pada masa akan datang.
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="https://www.facebook.com/billplzplugin">Facebook</a>
				</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center">
						Jumlah Sumbangan Terkumpul : RM<?php $str = file_get_contents(__DIR__."/saved.json");
$json = json_decode($str, true);
echo $json['amount']; ?>

					</h3>
				</div>
			</div>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
<?php
if (isset($_GET['billplz'])){
	$ohu = "<script>window.setTimeout(function(){window.location.href = 'https://www.wanzul.net/donate/display.php';}, 3000);</script>";
	echo $ohu;
}
?>