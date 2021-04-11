<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- collecting sender's information -->
<?php
include('connect.php');
$sender_id=$_GET['id'];
$extract = mysqli_query($connect,"SELECT * FROM customers where cust_id=' $sender_id' ") ;
 $row = mysqli_fetch_array($extract);
 $balance_db=$row['balance'];
 //$cust_id=$row['cust_id'];
 $name=$row['name'];
 $email_id=$row['email_id'];
?>

 <?php
if(isset($_POST['submit']))
{
  $sender_id=$_POST['sender_id'];
  $receiver_name=$_POST['receiver_name'];
  $amount=$_POST['amount'];
  
  
   //extracting info of sender and receiver
  $extract1 = mysqli_query($connect,"SELECT * FROM customers where cust_id=' $sender_id ' ") ;
  $extract2 = mysqli_query($connect,"SELECT * FROM customers where name='$receiver_name' ") ;//receiver
    
      $row1 = mysqli_fetch_array($extract1);
      $sender_balance=$row1['balance'];
      $sender_name=$row1['cust_id'];
      $sender_email_id=$row1['email_id'];

      $row2 = mysqli_fetch_array($extract2);
      $receiver_id=$row2['cust_id'];
      $receiver_balance=$row2['balance'];
      $receiver_id=$row2['cust_id'];
      $receiver_email_id=$row2['email_id'];
    
      //checking for insufficient funds
      if($amount > $sender_balance){
        
        ?>
        <script type="text/javascript">
               swal({
                      title: "Insufficient Balance",
                      text: "Cannot transfer this amount",
                      icon: "error"
                  }).then(function() {
                      window.location = "send_money.php";
                  });
               </script> 
        <?php
      }
      else
      {
            //inserting in transactions table
            $sql1=" INSERT INTO `transactions` VAlUES(default,'$sender_email_id','$receiver_email_id',$amount,NOW() ) " ;
            $query=mysqli_query($connect,$sql1);
           
           $newbalance=$sender_balance-$amount;
           $sql2="UPDATE `customers` set balance = $newbalance where cust_id=$sender_id ";
           $query=mysqli_query($connect,$sql2);
          
           $newbalance1=$receiver_balance + $amount;
           $sql3="UPDATE `customers` set balance = $newbalance1 where cust_id=$receiver_id";
           $query=mysqli_query($connect,$sql3);
             if ($query) 
             {
             ?>
             <script type="text/javascript">
               swal({
                      title: "Done",
                      text: "Money was successfully transfered!!",
                      icon: "success"
                  }).then(function() {
                      window.location = "send_money.php";
                  });
               </script> 
             <?php    
             } 
           else 
           {
              echo "Error";
           }
        }   
    
}?>

</head>

<body>
 <div class="container">
    <!-- including the header -->
    <?php include('header.php'); ?>
 </div><br><br><br>

  <!-- showing sender's details -->
  <div class="container">
    <h2>Sender's Account Details</h2>
    <table class="table ">
      <thead>
        <tr style="background-color: #248232;">
          <th>Name</th>
          <th>Email</th>
          <th>Balance</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><?php echo"$name"; ?></th>
          <th><?php echo "$email_id";  ?></th>
          <th><?php echo "$balance_db"; ?></th>
        </tr>
      </tbody>
    </table>
  </div>    

  <!-- showing receiver's details -->
  <div class="container">
    <h2>Receiver's Account Details</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table class="table ">
      <thead>
        <tr style="background-color:#248232;">
          <th>Name</th>
          <th>Amount</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>
             <select name="receiver_name" style="color: black;" required>
             <option value="" disabled selected>Select Receiver's Name</option>
             <?php 
             $extract1 = mysqli_query($connect,"SELECT * FROM customers where cust_id !=' $sender_id' ") ;
              while ($row = mysqli_fetch_assoc($extract1))
              { 
                  echo ("<option value='".$row['name']."'>".$row['name']."</option>");
              }
              ?>  
            </select> 
            
          </th>
          <th><input type="text" style="color: black;" name="amount" required> </th>
          <th><button type="submit" class="btn btn-success btn-lg" name="submit">Transfer money</button></th>
          <input type="" name="sender_id" value='<?php echo"$sender_id"; ?>' hidden> 
        </tr>
      </tbody>
    </table>
    </form>
  </div><br><br>

  <!-- footer  -->
  <div class="container">
  <?php include('footer.php'); ?>
  </div>
  </body>

 
</html>
