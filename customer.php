<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
  height:20%;
  align:center;
  margin-left: auto;
  margin-right: auto;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #72BBF5;
}
.button {
  background-color: #7288F5; /* Green */
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<div><h1 ><center><i>Account Information</i></center></h1></div>
<?php
    $con=mysqli_connect("localhost","root","","spark");
    
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $data=mysqli_real_escape_string($con,$_POST['data']);
    $result = mysqli_query($con,"SELECT * FROM customers where CID=$data");
    $result2=mysqli_query($con,"SELECT * FROM customers");
   echo "<table >";
   echo "<tr><th>Name</th><th>Email</th><th>CID</th><th>ContactNo</th><th>Balance</th></tr>";
 while($row = mysqli_fetch_array($result))
          {
          echo "<tr 
><td >" . $row['Name'] . "</td><td > " . $row['Email'] . "</td><td>".$row['CID']."</td><td>".$row['ContactNo']."</td><td>".$row['Balance']."</td></tr>";

          }
 echo "</table>";

    mysqli_close($con);
    ?>
<div ><h1 ><center><i>Transfer Money</i></center></h1></div>
<form method=post action=checktransfer.php  enctype='multipart/form-data'>
<table>

<tr><td><b>Customers Name</b></td><td><select id='custname' name='to'> 
<option value="" disabled selected>Choose</option>
    <?php

    $con=mysqli_connect("localhost","root","","spark"); 
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result2=mysqli_query($con,"SELECT * FROM customers");
    while($row = mysqli_fetch_assoc($result2)){
?>
<option  value="<?php echo $row['CID'];?>">
<?php echo $row['Email'];?></option><?php
}
?>
</select></td><td><b>Amount</b></td><td><input type='number' name='amt'></td>
     
    <td><button type='submit' class='button' name='from' value="<?php  $con=mysqli_connect("localhost","root","","spark");
    
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
$data=mysqli_real_escape_string($con,$_POST['data']);
echo $data; ?>">Transfer</button> </td></tr>";
</table>
</form>
</html>