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
<div ><h1 ><center><i>Customers Table</i></center></h1></div>
<?php




    $con=mysqli_connect("localhost","root","","spark");
    
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $result = mysqli_query($con,"SELECT * FROM customers");

   echo "<table >";
   echo "<tr><th>Name</th><th>Email</th><th>CID</th><th>ContactNo</th><th>View</th></tr>";
 while($row = mysqli_fetch_array($result))
          {
          echo "<tr 
><td >" . $row['Name'] . "</td><td > " . $row['Email'] . "</td><td>".$row['CID']."</td><td>".$row['ContactNo']."</td><td><form method=post action=customer.php  enctype='multipart/form-data'> <button type='submit' class='button' name='data' value=".$row['CID'].">View</button> </form></td></tr>";

          }
 echo "</table>";

    mysqli_close($con);
    ?>

</html>