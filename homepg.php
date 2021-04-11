<!DOCTYPE html>
<html lang="en">
<head>
  <title>Basic Banking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<!-- including the header -->
<?php include('header.php'); ?>
<div class="jumbotron text-center">
  <h1>Basic Banking System</h1> 
  <p>Transfer Money with ease</p> 
  <a type="button" class="btn btn-success btn-lg" href="send_money.php">SEND MONEY</a>
</div>
<!-- including the footer -->
<div class="container">
	<?php include('footer.php'); ?>
</div>

</body>
</html>
