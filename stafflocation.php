<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
<title>Staff Locations Page</title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<link rel="stylesheet" type="text/css" href="style.css">
<script src="main.js"></script>

</head>

<body style="background-attachment: fixed">

<div style="text-align:center;">
<button type = "button" onclick = "location.href='index.php'"> Add a New User </button>
    <button type = "button" onclick = "location.href='location.php'"> View by Location </button>
    <button type = "button" onclick = "location.href='changelocation.php'"> Change Location </button> 
    <button type = "button" onclick = "location.href='editdetails.php'"> Edit Details </button>
    <button type = "button" onclick = "location.href='last24hours.php'"> Last 24 Hours </button>
    <button type = "button" onclick = "location.href='stafflocation.php'"> Staff Locations </button>
</div>

<div class="headercontainer">
<div class="logo">
<span class="left"><</span>UoH Location Services<span class="right">/></span>
    <div class="text">
        <span class="word">Staff </span><span class="web"> Locations</span>
    </div>
</div>
</div>
<br> <br>

<?php 

$server = 'sql.rde.hull.ac.uk';
$connectionInfo = array("Database"=>"rde_554754");
$conn = sqlsrv_connect($server,$connectionInfo);      

echo "<table class = table-fill>
<tr>        

<th> Forename </th>
<th> Surname </th>
<th> Location </th>
<th> Date/Time </th>
</tr>";

        $select_query = "SELECT * FROM locationTable WHERE userType like 'Staff' ORDER BY currentDate DESC";          
        $result = sqlsrv_query($conn, $select_query);
        while($row = sqlsrv_fetch_array($result))
        {                              
            echo "<tr>";             
            echo "<td>" . $row['FirstName'] . "</td>" ;  
            echo "<td>" . $row['Surname'] . "</td>" ;             
            echo "<td>" . $row['currentLocation'] . "</td>" ;                 
            echo "<td>" . $string = $row['currentDate'] ->format (' Y-m-d H:i:s ') . "</td>";  
            echo "</tr>";                         
        }
        echo "</table>";
    sqlsrv_close($conn);
?>

<footer>Web Technologies ACW,    created by Brian Davis</footer> 
</body>
</html>