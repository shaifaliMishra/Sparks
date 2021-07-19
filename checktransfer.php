<?php
    $con=mysqli_connect("localhost","root","","spark");
    
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $to=mysqli_real_escape_string($con,$_POST['to']);
    $from=mysqli_real_escape_string($con,$_POST['from']);
    $amount=mysqli_real_escape_string($con,$_POST['amt']);
    $bal1= mysqli_query($con,"SELECT Balance FROM customers where CID=$to");
    $bal2=mysqli_query($con,"SELECT Balance FROM customers where CID=$from");
    $row1=mysqli_fetch_array($bal1);
    $row2=mysqli_fetch_array($bal2);
  
     if($amount>$row2[0])
    {
        
       header("Location:msg.html");
    }
    else
    {
       $sql="INSERT INTO transfer VALUES('$from','$to','$amount',now())";
     if(mysqli_query($con,$sql))
     echo "Done!!";
      $x=$row1[0]+$amount;
      $y=$row2[0]-$amount;
      $res1=mysqli_query($con,"UPDATE customers SET Balance=$x where CID=$to");	
      $res2=mysqli_query($con,"UPDATE customers SET Balance=$y where CID=$from");
      header("Location:succ.html");
      }
  		
?>