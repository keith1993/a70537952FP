<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT Target_ID, Target_Name, Target_Amount, Target_Days FROM target";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1>
    <tr>
    <th>Target ID</th>
    <th>Target Name</th>
    <th>Target Amount</th>
    <th>Target Days</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Target_ID"] . "</td>";
        echo "<td><a href=\"" . $row["Target_Name"] . "\">" . $row["Target_Name"] . "</a></td>";
        echo "<td>" . $row["Target_Amount"] . "</td>";
        echo "<td>" . $row["Target_Days"] . "</td>";
        echo "<td><a href=" . $row["Target_Name"] . ">Edit</a></td>";
        echo "<td><input type=\"checkbox\" name=\"delete\" /></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" type="text/css" href="../../Public/css/target.css">
   </head>
   <body>

     <?php
     if(isset($_POST['delete']))
     {
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "Finance";

       // Create connection
       $conn = new mysqli($servername, $username, $password, $dbname);
       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

     $Target_ID = $_POST['Target_ID'];

     $sql = "DELETE FROM target WHERE Target_ID = $Target_ID" ;

     $retval = mysqli_query($conn, $sql);
     if(! $retval )
     {
       die('Could not delete data: ' . mysql_error());
     }
     ?>
     <script type="text/javascript">
          alert "Deleted data successfully";
     </script>
     <?
     mysqli_close($conn);
     }
     else
     {
     ?>

     <?php
     }
     ?>
     <a href="javascript:void(0)"onclick="toggle_visibility('popup1');">Search and Delete</a>
     <div id="popup1" class="popup-position">
         <div id="popup-wrapper">
           <div id="popup-container">
               <h3>Enter the Target ID below to delete a record</h3>
               <!--../Controllers/TargetInsert.php-->
               <form method="post" action="<?php $_PHP_SELF ?>">
               <table width="400" border="0" cellspacing="1" cellpadding="2">
               <tr>
               <td width="100">Target ID</td>
               <td><input name="Target_ID" type="number" id="Target_ID"></td>
               </tr>
               <tr>
               <td width="100"> </td>
               <td> </td>
               </tr>
               <tr>
               <td width="100"> </td>
               <td>
               <input name="delete" type="submit" id="delete" value="Delete">
               </td>
               </tr>
               </table>
               </form>
               <a href="javascript:void(0)"onclick="toggle_visibility('popup1');">Close</a>

           </div><!--popup_container ends-->
         </div><!--popup-wrapper ends-->
     </div><!--popup1 ends-->

     <script src="../../Public/js/target.js"></script>
   </body>
 </html>
