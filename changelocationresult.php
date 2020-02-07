<?php 

        $server = 'sql.rde.hull.ac.uk';
        $connectionInfo = array("Database"=>"rde_554754");
        $conn = sqlsrv_connect($server,$connectionInfo);

            //define empty starter variables
            $useridErr = $locationErr = "";
            $userid = $location = "";

            if ($_SERVER["REQUEST_METHOD"] == "GET") {            

            $userid = $_GET["userID"];           
            $firstnameValue = "SELECT FirstName FROM locationTable WHERE UserID LIKE '$userid'";
            $surnameValue = "SELECT Surname FROM locationTable WHERE UserID LIKE '$userid'";
            $userTypeValue = "SELECT UserType FROM locationTable WHERE UserID LIKE '$userid'";
            $location = $_GET["location"];
                 
            $fetchfirstName = sqlsrv_query($conn, $firstnameValue);
            $fetchsurname = sqlsrv_query($conn, $surnameValue);
            $fetchuserType = sqlsrv_query($conn, $userTypeValue);

            $firstname = sqlsrv_fetch_array($fetchfirstName);
            $surname = sqlsrv_fetch_array($fetchsurname); 
            $userType = sqlsrv_fetch_array($fetchuserType);
            }

            $ExistingUser = "SELECT UserID FROM locationTable WHERE UserID LIKE '$userid'";
            $fetchExistingUser = sqlsrv_query($conn, $ExistingUser);
            $ExistingUserID = sqlsrv_fetch_array($fetchExistingUser);

            if ($ExistingUserID['UserID'] == $userid) 
            {
            $insert_query = "INSERT INTO locationTable (UserID, FirstName, Surname, UserType, currentLocation, currentDate)
            VALUES (?, ?, ?, ?, ?, SYSDATETIME())";
            $params = array($userid, $firstname[FirstName], $surname[Surname], $userType[UserType], $location);

            $confirmmessage = "Success, Location Updated";
            echo "<script type='text/javascript'>alert('$confirmmessage');</script>"; 
            }
            else {
                $errormessage = "Error in entry, please make sure ID is correct";
                echo "<script type='text/javascript'>alert('$errormessage');</script>";  
            }

            $result = sqlsrv_query($conn,$insert_query, $params);

            sqlsrv_close($conn);     

        header("refresh:0 url=changelocation.php");
        die();
?>
