<!DOCTYPE html>
<html>
<?php
include('connect.php');
$extract = mysqli_query($connect,"SELECT * FROM customers") ;
?>
<head>
  <title>VIEW CUSTOMERS DETAILS</title>
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
    <h2>Select the Sender</h2>
    <table class="table ">
      <thead>
        <tr style="background-color: #248232;">
          <th>Name</th>
          <th>Email</th>
          <th>Balance</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php while($row = mysqli_fetch_array($extract))
          { ?>
          <th><?php echo $row['name'] ; ?></th>
          <th><?php echo $row['email_id'] ; ?></th>
          <th><?php echo $row['balance'] ; ?></th>
          <th><a type="button" class="btn btn-success btn-lg" href="send_money_action.php?id= <?php echo $row['cust_id'] ;?>">Transfer Money</a></th>
        </tr><?php } ?>
      </tbody>
    </table> 
  </div><br><br>

  <div class="container">
  <?php include('footer.php'); ?>
</div>
</body>
</html>