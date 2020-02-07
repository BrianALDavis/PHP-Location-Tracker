<?php 
        $server = 'sql.rde.hull.ac.uk';
        $connectionInfo = array("Database"=>"rde_554754");
        $conn = sqlsrv_connect($server,$connectionInfo);

        //define empty starter variables
        $useridErr = $firstnameErr = $surnameErr = $userTypeErr = "";
        $userid = $firstname = $surname = $userType = "";

            //if (empty($_POST["staffID"])) {
            //    $staffidErr = "Staff ID is Required";
            //}
            //else {
            //    $userid = entry_data($_POST["staffID"]);
            //        if (!preg_match("/^\d+$/", $staffid)) {
            //            $staffidErr = "Only Numbers Allowed";
            // }

            if (empty($_POST["userID"])) {
                $useridErr = "User ID is Required and cannot be longer than 6 numbers";
            }
            else {
                $userid = entry_data($_POST["userID"]);
                    if (!preg_match("/^((?!(0))[0-9]{6})$/", $userid)) {
                        $useridErr = "Only Numbers Allowed";
                    }    
                if (strlen($userid) != 6)
                {
                    $useridErr = "The ID cannot exceed 6 numbers";
                }
                if (($userid) == 0)
                    {
                        $useridErr = "Cannot be 0";
                    }
            }        

            if (empty($_POST["firstname"])) {
                $firstnameErr = "First Name is Required";                  
            }
            else {
                $firstname = entry_data($_POST["firstname"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                    $firstnameErr = "Only letters and White space allowed";
                }
                if (strlen($firstname) >= 19) {
                    $firstnameErr = "First Name can't be longer than 20 characters";
                }
            }            

            if (empty($_POST["surname"]))
            {
                $surnameErr = "Surname is Required";
            } 
            else { 
                $surname = entry_data($_POST["surname"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $surname)) {
                    $surnameErr = "Surname is Required";
                }
                if (strlen($surname) >= 19) {
                    $surnameErr = "Surname can't be longer than 20 characters";
                }
            }

            if (empty($_POST["userType"]))
                {
                    $userTypeErr = "A User Type selection is Required";
                }
                else {
                    $userType = entry_data($_POST["userType"]);
                }        
                
            function entry_data($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }    

            //define Checker to make sure they are a staff member to be able to edit
            //$editor = "SELECT UserID FROM locationTable WHERE UserType LIKE 'Staff' AND UserID LIKE $staffid";
            //$editdetails = sqlsrv_query($conn, $editor);
            //$usereditdetailscomplete = sqlsrv_fetch_array($editdetails);

            //define Existing checker to make sure the ID exists first
            $ExistingUser = "SELECT UserID FROM locationTable WHERE UserID LIKE $userid";
            $fetchExistingUser = sqlsrv_query($conn, $ExistingUser);
            $ExistingUserID = sqlsrv_fetch_array($fetchExistingUser);

            if(($useridErr == "") && ($firstnameErr =="") && ($surnameErr =="") && $userTypeErr == "")
            {
                    if ($ExistingUserID['UserID'] == $userid)
                        {                
                            $confirmmessage = "Success, details edited";
                            echo "<script type='text/javascript'>alert('$confirmmessage');</script>"; 
                            $params = array($firstname, $surname, $userType);             
                            $edit_query = "UPDATE locationTable SET FirstName = ?, Surname = ?, UserType = ? WHERE UserID = '$userid'";                    
                        }
                            else {
                                $confirmmessage = "Denied, User ID Incorrect";
                            echo "<script type='text/javascript'>alert('$confirmmessage');</script>";  
                             }
                        $result = sqlsrv_query($conn,$edit_query, $params); 
            }
            else {
                $errormessage = "Error in entry, check your entry and try again";
                echo "<script type='text/javascript'>alert('$errormessage');</script>";
            }

        sqlsrv_close($conn);
        header("refresh:0 url=editdetails.php");
        die();
    ?>           