<!DOCTYPE html>
<html>
<?php
include('connect.php');
$extract = mysqli_query($connect,"SELECT * FROM transactions order by date_time desc") ;
?>
<head>
  <title>VIEW TRANSACTION HISTORY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>

<body>
  <div class="container">
    <!-- including the header -->
    <?php include('header.php'); ?>
   </div><br><br><br>
  <div class="container">
    <h2>Transactions Details</h2>
    <table class="table ">
      <thead>
        <tr style="background-color: #248232;">
          <th>Sender</th>
          <th>Receiver</th>
          <th>Date Time</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php while($row = mysqli_fetch_array($extract))
          { ?>
          <th><?php echo $row['sender'] ; ?></th>
          <th><?php echo $row['receiver'] ; ?></th>
          <th><?php echo $row['date_time'] ; ?></th>
          <th><?php echo $row['amount'] ; ?></th>
        </tr><?php } ?>
      </tbody>
    </table> 
  </div><br><br>

  <div class="container">
  <?php include('footer.php'); ?>
</div>
</body>
</html>