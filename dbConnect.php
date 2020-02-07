<?php

$server = 'sql.rde.hull.ac.uk';
$connectionInfo = array("Database"=>"rde_554754");
$conn = sqlsrv_connect($server,$connectionInfo);

if (!conn)
{
   echo "connection failed";
}
else {
    echo "connection successful";
}

?>