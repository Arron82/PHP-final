<!--
    This is the error file.  It displays any messages associated with the error
    in data entry or failure to access the database when index.php loads.
    Author:     Arron Pelc
    Date:       05/05/2020
    Filename:   error.php
    FINAL PROJECT
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body id="alertBody">
    <header id="alertHeader">
        <div>
            <h1>ERROR!</h1>
            <p>Please use the back button on your browser</p>
        </div>
        
    </header>
    <div id="alert">
            <?php echo $alert ?>
    </div>
    
</body>
</html>