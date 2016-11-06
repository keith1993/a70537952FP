
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" type="text/css" href="../../Public/css/target.css">
   </head>
   <body>

     <a href="javascript:void(0)"onclick="toggle_visibility('popup1');">Search</a>

     <div id="popup1" class="popup-position">
         <div id="popup-wrapper">
           <div id="popup-container">
             <a href="javascript:void(0)"onclick="toggle_visibility('popup1');"style="float: right; text-decoration: none; color: red;">X</a>
             <div id="myRadioGroup">
               <input onclick="javascript:toggle();" type="radio"  name="deleteEdit" checked="checked" value="delete"  />Delete
               <input onclick="javascript:toggle();" type="radio"  name="deleteEdit" value="edit" />Update
             </div>


               <h3 id="displayText">Enter the Target ID below to DELETE a record</h3>
               <h3 id="txtHint"></h3>

               <form action= "../Controllers/TargetDelete.php" method="post" style="display:none;" id="deleteForm">
               <table width="400" border="0" cellspacing="1" cellpadding="2">
               <tr>
               <td width="100">Target ID</td>
               <td><input name="Target_ID" type="number" id="Target_ID" ></td>
               </tr>
               <tr>
               <td width="100"> </td>
               <td> </td>
               </tr>
               <tr>
               <td width="100"> </td>
               </tr>
               </table>
              <input name="delete" type="submit" id="delete" value="Delete" style="display:none;">
               </form>

                                             <div >
                                               <form action="../Controllers/TargetUpdate.php" method="post" >
                                                 <table id="updateForm" style="display: none" >
                                                   <tr>
                                                     <td width="100">Target ID</td>
                                                     <td>
                                                       <input name="Target_ID" type="number" id="Target_ID">
                                                     </td>
                                                   </tr>
                                                 <tr>
                                                   <td>
                                                     Target Name:
                                                   </td>
                                                   <td>
                                                     <input type="text" name="Target_Name">
                                                   </td>
                                                 </tr>
                                                 <tr>
                                                   <td>
                                                     Target Amount:
                                                   </td>
                                                   <td>
                                                     <input type="text" name="Target_Amount">
                                                   </td>
                                                 </tr>
                                                 <tr>
                                                   <td>
                                                     Target Achieve Date:
                                                   </td>
                                                   <td>
                                                     <input type="date" name="Target_AchieveDate">
                                                   </td>
                                                 </tr>
                                                 <tr>
                                                   <td>
                                                     Target Days:
                                                   </td>
                                                   <td>
                                                     <input type="text" name="Target_Days">
                                                   </td>
                                                 </tr>
                                                 </table>

                                                 <input name="update" type="submit" id="update" value="Update" style="display:none;" >
                                               </form>
                                             </div>

           </div><!--popup_container ends-->
         </div><!--popup-wrapper ends-->
     </div><!--popup1 ends-->

     <div id="popup2" class="popup-position">
         <div id="popup-wrapper">
           <div id="popup-container">
             <a href="javascript:void(0)"onclick="toggle_visibility('popup2');"style="float: right; text-decoration: none; color: red;">X</a>
             <div >
               <form action="../Controllers/TargetUpdate.php" method="post" >
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
                 $Target_ID =   ;

                 $sql = "SELECT Target_ID, Target_Name, Target_Amount, Target_Days, Target_AchieveDate,Target_EnterDate FROM target WHERE Target_ID = $Target_ID";
                 $result = $conn->query($sql);

                 ?>
                 <table id="updateForm" style="display: block" >
                   <tr>
                     <td width="100">Target ID</td>
                     <td>
                       <input name="Target_ID" type="number" id="Target_ID" value="<?php $Target_ID ?>">
                     </td>
                   </tr>
                 <tr>
                   <td>
                     Target Name:
                   </td>
                   <td>
                     <input type="text" name="Target_Name">
                   </td>
                 </tr>
                 <tr>
                   <td>
                     Target Amount:
                   </td>
                   <td>
                     <input type="text" name="Target_Amount">
                   </td>
                 </tr>
                 <tr>
                   <td>
                     Target Achieve Date:
                   </td>
                   <td>
                     <input type="date" name="Target_AchieveDate">
                   </td>
                 </tr>
                 <tr>
                   <td>
                     Target Days:
                   </td>
                   <td>
                     <input type="text" name="Target_Days">
                   </td>
                 </tr>
                 </table>

                 <input name="update" type="submit" id="update" value="Update" style="display:none;" >
               </form>
             </div>
           </div><!--popup_container ends-->
         </div><!--popup-wrapper ends-->
     </div><!--popup1 ends-->

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


     $sql = "SELECT Target_ID, Target_Name, Target_Amount, Target_Days, Target_AchieveDate,Target_EnterDate FROM target";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         echo "<form action=\"../Controllers/TargetMultiDelete.php\" method=\"POST\">";
         echo "<table border=1>
         <tr>
         <th>Target ID</th>
         <th>Target Name</th>
         <th>Target Amount</th>
         <th>Target EnterDate</th>
         <th>Target Achieve Date</th>
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
             echo "<td>" . $row["Target_EnterDate"] . "</td>";
             echo "<td>" . $row["Target_AchieveDate"] . "</td>";
             echo "<td>" . $row["Target_Days"] . "</td>";
             ?>
             <td><a href="javascript:void(0)"onclick="toggle_visibility('popup2');">Edit</a></td>
             <td>
               <input type="checkbox" name="num[]" value="<?php echo $row["Target_ID"] ?>">
             </td>
             <?php
             echo "</tr>";
         }
         echo "</table>";
         ?>
        <input type="submit" name="submit1" value="DeleteSelected"/>
         <?php
        echo "</form>";
     } else {
         echo "0 results";
     }
      ?>

     <script src="../../Public/js/jquery.min.js"></script>
     <script src="../../Public/js/target.js"></script>
   </body>
 </html>
