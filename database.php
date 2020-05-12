<!--
    This file accesses the database
    Author:     Arron Pelc
    Date:       05/05/2020
    filename:   database.php
    Final Project
-->

<?PHP
    $dsn = 'mysql:host=localhost;dbname=student_registration';
    $username = 'root';
    $password = '';

    try
    {
        $conn = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e)
    {
        $error = $e->getMessage();
        include('error.php');
        exit();
    }
?>