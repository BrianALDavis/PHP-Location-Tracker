<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
<title>View Locations Page</title>
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
        <span class="word">View by </span><span class="web"> Location</span>
    </div>
</div>
</div>

<div class="formcontainer">  
<form id="entry" action="locationsearch.php" method="get" name="submit">
    <h4> Find all users by Location: </h4>
    <fieldset>
    <select class = "dropdown" name="location"  placeholder="location" required/>
                <option value=""> Select Location... </option>
                <option value="RBB-209A"> RBB-209A </option>
                <option value="RBB-209B"> RBB-209B </option>
                <option value="FENNER 57A"> FENNER Section A </option>
                <option value="FENNER 57B"> FENNER Section B </option>
                <option value="LARKIN"> Larkin Building </option>
                <option value="APP SCI"> Applied Sciences </option>
                <option value="Venn"> Venn </option>  
                <option value="Esk Allam"> Esk Allam Building </option>  
                <option value="Wilberforce"> Wilberforce </option>  
                <option value="Student Union"> Student Union Building </option>                  
             </select>
        </fieldset>      
        <button name="submit" type="submit" id="entry-submit" data-submit="Submit my information" /> Submit </button>
    </form>     
    <footer>Web Technologies ACW,    created by Brian Davis</footer> 
</body>
</html>