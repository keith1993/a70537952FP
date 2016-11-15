<?php
spl_autoload_register(function ($class) {


    if (strpos($class, "Base") === 0) {
        require '../Framework/' . $class . '.php';
    } else if (strpos($class, "Model")) {
        require '../Models/' . $class . '.php';
    } else if (strpos($class, "Object")) {
        require '../Objects/' . $class . '.php';
    }else{
        require "../../Helper/".$class.".php";
    }

});
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])) {

    $userModel = new UserModel();
    $jj = $userModel->Login($_SESSION["email"], $_SESSION["password"], $_SERVER["REMOTE_ADDR"]);

    if ($jj instanceof UserObject) {





    } else {
        echo "Error!" . mysql_error();
        session_unset();
        session_destroy();
        header("Location: ../../index.php");

    }

// echo "已登录";
} else {
    session_unset();
    session_destroy();
    header("Location: ../../index.php");
    // echo "未登录";
    //echo "请重新登录";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="../../Public/css/bootstrap1.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Public/css/MDB PRO 4.2.0.css">
    <link href="../../Public/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../Public/css/target.css">



    <script src="../../Public/js/jquery-3.1.1.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Tooltips -->
    <script type="text/javascript" src="../../Public/js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../Public/js/mdb.min.js"></script>
    <script src="../../Helper/footable-standalone.latest/js/footable.min.js"></script>
    <script src="../../Helper/js-cookie-1.5.1/src/js.cookie.js"></script>
    <script src="../../Public/js/moment.js"></script>
    <script src="../../Public/js/header.js"></script>
    <script src="../../Public/js/target.js"></script>
    <script src="../../Public/js/jquery.min.js"></script>
	<script src="../../Public/js/jquery.parallax.js"></script>
	<script src="../../Public/js/jquery-1.10.2.js"></script>
	<script src="../../Public/js/jquery-2.2.3.min.js"></script>
	<script src="../../Public/js/jquery-3.1.1.min.js"></script>

</head>
<body class="fixed-sn hideXScroll">
<header>

    <!-- Sidebar navigation -->
    <ul id="mySidenav" class="side-nav fixed sidenav" style="z-index: 11;">

<span id="navControl" class="collapsible-header waves-effect"
      style="font-size:30px;cursor:pointer;text-align: center;display: inline-block;width:100%;margin-top: 10px;"
      onclick="setNav()">&#9776; </span>
        <!-- Logo -->
        <li id="userLogo" style="display: none;">
            <div class="logo-wrapper waves-light sn-avatar-wrapper">
                <a href="Application/Controllers/UserProfile.php">
                    <img src="<?php echo " ../../Public/uploads/".$jj->UserImage;?>" class="img-circle">
                </a>
            </div>
        </li>
        <!--/. Logo -->

        <!--Social-->
        <!--RED,PURPLE,DARK,MDB,GRAPHITE,PINK-->
        <li id="colorStyle" style="display: none">
            <ul class="social">
                <li><a class="icons-sm fb-ic" onclick="changeStyle('red')"><i class="fa fa-square" style="color: #900"> </i></a></li>
                <li><a class="icons-sm git-ic" onclick="changeStyle('purple')"><i class="fa fa-square" style="color: #54057d"> </i></a></li>
                <li><a class="icons-sm li-ic" onclick="changeStyle('green')"><i class="fa fa-square" style="color: #003830"> </i></a></li>
                <li><a class="icons-sm yt-ic" onclick="changeStyle('mdb')"><i class="fa fa-square" style="color: #3f729b"> </i></a></li>
                <li><a class="icons-sm gplus-ic" onclick="changeStyle('graphite')"><i class="fa fa-square" style="color: #37474f"> </i></a></li>
                <li><a class="icons-sm li-ic" onclick="changeStyle('pink')"><i class="fa fa-square" style="color: #ab1550"> </i></a></li>

            </ul>
        </li>


        <!--/Social-->

        <!-- Side navigation links -->
        <li id="sideNavItem" style="display: none">
            <ul class="collapsible collapsible-accordion">
                <li><a href="../../index.php" collapsible-header waves-effect"><i
                        class="fa fa-home"></i>Home</i></a></li>
                <li><a href="../Controllers/UserProfile.php" collapsible-header waves-effect"><i
                        class="fa fa-user"></i>Profile</i></a></li>
                <li><a href="target.php" class="collapsible-header waves-effect"><i class="fa fa-check-square-o"></i>Target</i></a></li>
                <li><a href="../Controllers/Ranking.php" class="collapsible-header waves-effect"><i class="fa fa-table"></i>Ranking</i></a></li>
                <li><a href="../Controllers/ScheduleSetting.php" class="collapsible-header waves-effect"><i class="fa fa-gear"></i>Schedule Setting</i></a></li>
                <!-- <li><a class="collapsible-header waves-effect"><i class="fa fa-bar-chart"></i>Marketing</i></a></li>
                 <li><a class="collapsible-header waves-effect"><i class="fa fa-pencil"></i> Contact</i></a></li>
                 <li><a class="collapsible-header waves-effect"><i class="fa fa-user"></i> About</i></a></li>-->
            </ul>
        </li>

        <!--/. Side navigation links -->


    </ul>

    <!--/. Sidebar navigation -->

    <!--Navbar-->
    <nav class="navbar navbar-fixed-top scrolling-navbar double-nav main col-lg-12 col-md-12 col-sm-12"
         style="padding-left: 100px;z-index: 10; transition: 0.5s;">

        <!-- SideNav slide-out button -->


        <!-- Breadcrumb-->
        <div class="breadcrumb-dn">
            <p>Welcome,</p>
        </div>


        <ul onclick="showLogout()"id="profile" class="nav navbar-nav pull-right  ">


            <li id="logout"class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $jj->
                    FirstName;?></a>
                <div class="dropdown-menu dropdown-primary dd-right" aria-labelledby="dropdownMenu1"
                     data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                    <a class="dropdown-item"
                       href="../Controllers/Logout.php">Logout</a>
                </div>
            </li>
        </ul>

    </nav>
    <!--/.Navbar-->

</header>
<div id="wrapper" class="wrapper transition" style="min-height:710px;">
  <div id="popup1" class="popup-position">
      <div id="popup-wrapper">
        <div id="popup-container">
      <!--../Controllers/TargetInsert.php-->
            <form action="../Controllers/TargetInsert.php" method="post">
          <table>
            <tr>
              <td style="color: black;">
                Target Name:
              </td>
              <td>
                <input type="text" name="Target_Name">
              </td>
            </tr>
            <tr>
              <td style="color: black;">
                Target Amount:
              </td>
              <td>
                <input type="text" name="Target_Amount">
              </td>
            </tr>
            <tr>
              <td style="color: black;">
                Target Achieve Date:
              </td>
              <td>
                <input type="date" name="Target_AchieveDate" id="Target_AchieveDate" onfocus="dateDiff()">
              </td>
            </tr>
            <!-- no use for showing textbox
            <tr>
              <td>
                Target Days:
              </td>
              <td>
                <input type="text" name="Target_Days" id="Target_Days">
              </td>
            </tr>
          -->
          </table>
            <span style="position:fixed; left:62%; top:23%;">
            <input type="submit">
            </span>
            </form>
            <span style="position:fixed; left:67%; top:10%; color:red;">
            <a href="javascript:void(0)"onclick="toggle_visibility('popup1');">X</a>
            </span>
        </div><!--popup_container ends-->
      </div><!--popup-wrapper ends-->
  </div><!--popup1 ends-->

<!--
<p style="text-align:center;">
  <a href="javascript:void(0)"onclick="toggle_visibility('popup1');">Search</a>
</p>


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
    <!--</div><!--popup-wrapper ends-->
<!--</div><!--popup1 ends-->


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

if (mysqli_num_rows($result) >= 5) {
  ?>
  <style>
    #AddTargetLink1{
      Display:none;
    }
  </style>
  <?php
  }
if ($result->num_rows > 0) {

    echo "<form action=\"../Controllers/TargetMultiDelete.php\" method=\"POST\">";
    echo "<table border=1 style=\"text-align:center; border:1px;
    margin: auto;
    width:65%;
    position:fixed;
    top:50%;
    left:20%;\">
    <tr>
    <th>Delete</th>
    <th>Edit</th>
    <th>Target Name</th>
    <th>Target Amount</th>
    <th>Target EnterDate</th>
    <th>Target Achieve Date</th>
    <th>Target Days</th>
    </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>"
        ?>
        <input type="checkbox" id="multiDelete" name="num[]" value="<?php echo $row["Target_ID"] ?>">
        <td><a href="../Controllers/TargetLinkUpdate.php?Target_ID=<?php echo $row["Target_ID"] ?>">Edit</a></td>
        <?php
        echo "</td>";
        echo "<td>" . $row["Target_Name"] . "</a></td>";
        echo "<td>" . $row["Target_Amount"] . "</td>";
        echo "<td>" . $row["Target_EnterDate"] . "</td>";
        echo "<td>" . $row["Target_AchieveDate"] . "</td>";
        echo "<td>" . $row["Target_Days"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <p style="text-align:center; top:81%; left:22%; position:fixed;">
      <input type="submit" id="submit1" name="submit1" value="DeleteSelected" />
    </p>
    <?php
   echo "</form>";

} else {
    echo "0 results";
}
 ?>
<!--Progress Bar new ends-->
<p style="text-align:center; top:42%; left:47%; position:fixed; ">
  <input id="AddTargetLink1" type="reset" value="Add Target" onclick="toggle_visibility('popup1');"/>
</p>
<p style="text-align:center; top:83%; left:50%; position:fixed; ">
    <a href="Target.php" style="color: #f00;">Back</a>
</p>
</div>
</body>

</html>
