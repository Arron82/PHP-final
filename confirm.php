<!--
    This file checks entered data for errors, and accesses either the error.php
    page or notifies user of successful data entry.
    Author:     Arron Pelc
    Date:       05/05/2020
    Filename:   confirm.php
    FINAL PROJECT
-->

<?php
    require_once('database.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $lName = $_POST['lName'];
        $prefName = $_POST['prefName'];
        $birthMonth = $_POST['birthMonth'];
        $birthDay = $_POST['birthDay'];
        $birthYear = $_POST['birthYear'];
        $gender = $_POST['gender'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $areaCode = $_POST['areaCode'];
        $phoneNum = $_POST['phoneNum'];
        $phoneType = $_POST['phoneType'];
        $areaCodeWork = $_POST['areaCodeWork'];
        $phoneNumWork = $_POST['phoneNumWork'];
        $companyName = $_POST['companyName'];
        $courseChoice = $_POST['courseChoice'];
        $comments = $_POST['comments'];

        

        if(empty($fName) || empty($lName))
        {
            $alert = "Please enter a complete name in the name field.";
            include ('error.php');
        }
        else if (empty($birthMonth) || empty($birthDay) || empty($birthYear))
        {
            $alert = "Invalid birth date.";
            include ('error.php');
        }
        else if (empty($gender))
        {
            $alert = "Please select gender.";
            include ('error.php');
        }
        else if (empty($address1) || empty($city) || empty($zip) || empty($state) || empty($country))
        {
            $alert = "Invalid address.";
            include ('error.php');
        }
        else if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $alert = "invalid email address.";
            include ('error.php');
        }
        else if (!empty($phoneNum) && !filter_var($phoneNum, FILTER_VALIDATE_INT))
        {
            $alert = "Invalid phone number.";
            include ('error.php');
        }
        else if (!empty($phoneNum) && !filter_var($areaCode, FILTER_VALIDATE_INT))
        {
            $alert = "Invalid phone number.";
            include ('error.php');
        }
        else if (!empty($phoneNumWork) && !filter_var($phoneNumWork, FILTER_VALIDATE_INT))
        {
            $alert = "Invalid work number.";
            include ('error.php');
        }
        else if (!empty($phoneNum) && $phoneType == NULL)
        {
            $alert = "Please select phone type.";
            include ('error.php');
        }        
        else if (empty($courseChoice))
        {
            $alert = "Invalid course choice.";
            include ('error.php');
        }
        
        else
        {
            $insertSQL = "INSERT INTO students (fName, mName, lName, prefName, birthMonth, birthDay,
                          birthYear, gender, address1, address2, city, state, zip, country, email, areaCode,
                          phoneNum, phoneType, areaCodeWork, phoneNumWork, companyName, courseChoice, comments)
                          VALUES (:fName, :mName, :lName, :prefName, :birthMonth, :birthDay,
                          :birthYear, :gender, :address1, :address2, :city, :state, :zip, :country, :email, :areaCode,
                          :phoneNum, :phoneType, :areaCodeWork, :phoneNumWork, :companyName, :courseChoice, :comments)";

            $statement2 = $conn->prepare($insertSQL);
            $statement2->execute(['fName' => $fName, 'mName' => $mName, 'lName' => $lName, 'prefName' => $prefName,
                                  'birthMonth' => $birthMonth, 'birthDay' => $birthDay, 'birthYear' => $birthYear,
                                  'gender' => $gender, 'address1' => $address1, 'address2' => $address2, 'city' => $city,
                                  'state' => $state, 'zip' => $zip, 'country' => $country, 'email' => $email,
                                  'areaCode' => $areaCode, 'phoneNum' => $phoneNum, 'phoneType' => $phoneType, 'areaCodeWork' => $areaCodeWork,
                                  'phoneNumWork' => $phoneNumWork, 'companyName' => $companyName, 'courseChoice' => $courseChoice,
                                  'comments' => $comments]);

            if(!empty($prefName))
            {
                $thanksName = $prefName;
            }
            else
            {
                $thanksName = $fName;
            }
           
        $alert = "Thank you, " . $thanksName . ".  Your information has been submitted.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Submission received</title>
</head>
<body id="alertBody">
    <header id="alertHeader">
        <h1>SUCCESS!</h1>
        <p>Your information has been received</p>
    </header>
    <div id="alert">
        <?php echo $alert?>
    </div>
    
</body>
</html>
<?php
        }
    }
?>

