<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
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
<div ><h1 ><center><i>Transactions</i></center></h1></div>
<?php




    $con=mysqli_connect("localhost","root","","spark");
    
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $result = mysqli_query($con,"SELECT * FROM transfer");

   echo "<table >";
   echo "<tr><th>From CID</th><th>To CID</th><th>Amount</th><th>Time</th></tr>";
 while($row = mysqli_fetch_array($result))
          {
          echo "<tr 
><td >" . $row['From_Cust'] . "</td><td > " . $row['To_Cust'] . "</td><td>".$row['Amount']."</td><td>".$row['Time']."</td></tr>";

          }
 echo "</table>";

    mysqli_close($con);
    ?>

</html>