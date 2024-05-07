<?php
try{
$pdo = new PDO("mysql:host=localhost; dbname=osc","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "ERROR : Could Not Connect with Database".$e-getMessage();
}
?>