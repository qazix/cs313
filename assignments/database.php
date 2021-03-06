<?php
   $DBServer = 'localhost'; // e.g 'localhost' or '192.168.1.100'
   $DBUser   = 'DFUser';
   $DBPass   = 'DF_PASS';
   $DBName   = 'drinkingFountains';
   $mysqli = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
     
   session_start();
   $loggedIn = false;
   
   if(isset($_SESSION['username']))
   {
      $loggedIn = true;
   }
?>

<!DOCTYPE html>
<html>
<head>
   <title>Drinking Fountains of BYUI</title>
   <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
   <script type="text/javascript" src="jshelper/db_refine.js"></script>
	<link href="css/db.css" rel="stylesheet" type="text/css"/>
</head>
<body>
   <header>
      <h2>Welcome to drink BYUI!</h2>
      <h6>Helping you find the best drinking fountains since 2014</h6>
      <h5><a href="phphelper/signIn.php">Log in</a>  <a href="phphelper/signUp.php">Sign Up</a></h5>
   </header>

   <form action="database.php" method="POST" id="results">
      <table>
      <thead>
         <tr>
            <th><select name="building" onchange="submitForm(this)"><option value="na" selected="selected">Building</option>;
                  <?php  
                  //This section here grabs all the buildings from my database
                     $buildings = $mysqli->query("SELECT * FROM buildings ORDER BY building_name");
                     while ($row = $buildings->fetch_assoc())
                     {
                        echo "<option value=\"" . $row["id"] . "\""; 
                        if (isset($_POST["building"]) && $_POST["building"] == $row["id"])
                        {
                           echo " selected=\"selected\""; 
                        }
                        echo ">" . $row["building_name"] . "</option>\n";
                     }
                  ?>
               </select>
            </th>
            <th>
               <?php
                  if (isset($_POST["building"]) && $_POST["building"] != "na")
                  {
                     echo "<select id=\"floor\" name=\"floor\" onchange=\"submitForm(this)\"><option value=\"na\" selected=\"selected\">Floor</option>";
                     $floor = 1;
                     //I have a numFloors column in the buildings db and getting it i need all these commands
                     $numFloors = $mysqli->query("SELECT numFloors FROM buildings WHERE id = " . $_POST["building"]);
                     $numFloors = $numFloors->fetch_assoc();
                     $numFloors = $numFloors["numFloors"];
                     
                     //Display all the floors in the building even if there are no water fountains on that floor
                     while ($floor <= $numFloors)
                     {
                        echo "<option value=\"" . $floor . "\""; 
                        if (isset($_POST["floor"]) && $_POST["floor"] == $floor)
                           echo " selected=\"selected\""; 
                        echo ">" . $floor . "</option>\n";
                        $floor = $floor + 1;
                     }
                     echo "</select>";
                  }
                  else
                  {
                     echo "Floor";
                  }                 
               ?>
            </th>
            <th>Near Room #</th>
            <th>Size</th>
            <th>
               <select name="bottle" onchange="submitForm(this)">
                  <?php
                     //This is only a boolean and i needed a throw away value
                     echo "<option value=\"2\" ";
                     if(isset($_POST["bottle"]) && $_POST["bottle"] == "2")
                        echo "selected=\"selected\"";
                     echo ">Bottle Fill?</option>";
                     
                     echo "<option value=\"0\" ";
                     if(isset($_POST["bottle"]) && $_POST["bottle"] == "0")
                        echo "selected=\"selected\"";
                     echo ">No Bottle Fill</option>";
                     
                     echo "<option value=\"1\" ";
                     if(isset($_POST["bottle"]) && $_POST["bottle"] == "1")
                        echo "selected=\"selected\"";
                     echo ">Has Bottle Fill</option>";
                  ?>
               </select>
            </th>
            <th>
               <select name="rating" onchange="submitForm(this)">
                  <?php
                     echo "<option value=\"DESC\" ";
                     if($_POST["rating"] == "DESC")
                        echo "selected=\"selected\"";
                     echo ">Rating Descending</option>";
                     
                     echo "<option value='' ";
                     if(isset($_POST["rating"]) && $_POST["rating"] == "")
                        echo "selected=\"selected\"";
                     echo ">Rating Ascending</option>";
                  ?>
               </select>
            </th>
         </tr>
      </thead>
      <tbody>
         <?php
            //string to use in querying the db
            $query = "SELECT rating, has_bottle_fill,
            b.building_name, l.floor, l.near_room_num, d.id, d.size_id FROM drinkingFountains
            AS d JOIN locations AS l ON d.location_id = l.id JOIN buildings 
            AS b ON l.building_id = b.id";
            
            //If one of these conditions is true then something has be assigned and we need to 
            //  refine our search
            if((isset($_POST["building"]) && $_POST["building"] != "na") || 
               (isset($_POST["bottle"]) && $_POST["bottle"] != 2))
               {
                  $query = $query . " WHERE ";
                  
                  //This is if building is set
                  if(isset($_POST["building"]) && $_POST["building"] != "na")
                  {
                     $query = $query . "l.building_id = " . $_POST["building"];
                     if(isset($_POST["floor"]) && $_POST["floor"] != "na")
                        $query = $query . " AND l.floor = " . $_POST["floor"];
                   
                     //In this case we need an and in front of d.has_bottle_fill
                     if(isset($_POST["bottle"]) && $_POST["bottle"] != 2)
                        $query = $query . " AND d.has_bottle_fill = " . $_POST["bottle"];
                  }
                  //This time d.has_bottle_fill is the only thing that changed so doens't need one
                  else
                     $query = $query . "d.has_bottle_fill = " . $_POST["bottle"];
               }
            
            //The ORDER BY clause has to be the last thing in the query
            $query = $query . " ORDER BY d.rating ";
            if (isset($_POST["rating"]))
            {
               $query = $query . $_POST['rating'];
            }
            else
            {
               $query = $query . "DESC";
            }
            $query = $query . " LIMIT 40";
             
            $results = $mysqli->query($query);
            while($row = $results->fetch_assoc())
            {
               echo "<tr onclick=\"changePage('phphelper/loadFount.php?fount=".$row['id']."')\";><td>" . 
                     $row["building_name"] . "</td><td align='center'>" .
                     $row["floor"] . "</td><td align='center'>" . $row["near_room_num"] . 
                     "</td>";
                     
               if ($row["size_id"] == 1)
                  echo "<td align='center'>Adult</td>";
               else 
                  echo "<td align='center'>Child</td>";
                  
               if ($row["has_bottle_fill"] == 1)
                  echo "<td align='center'>Yes</td>";
               else
                  echo "<td align='center'>No</td>";
               echo "</td><td align='center'>" . sprintf("%.1f", $row["rating"]) . "</td></tr>";   
            }
         ?>
      </tbody>
   </table>
   </form>
   <a href="phphelper/newFountain.php"><button>New Fountain</button></a>
</body>
</html>