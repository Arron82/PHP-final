<!--
    This is the main file that contains the form.  Students can enter there
    data here.
    Author:     Arron Pelc
    Date:       05/05/2020
    filename:   index.php
    Final Project

-->

<?PHP
    require_once('database.php');

    $alert = "";
    $curr_year = 2020;
    $thanksName = "";
    $prefName = "";

    $courses = 'SELECT courseName FROM courses';
        try
        {
            $statement = $conn->prepare($courses);
            $statement->execute();
            $result=$statement->fetchAll();
        }
        catch(Exception $ex)
        {
            echo($ex->getMessage());
        }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Student Registration</title>
</head>
<body>
<main>
<form action="confirm.php" method="post">
  
            <h1>Student Registration Form</h1>
            <h3>Student Name</h3>
            <div>
            <table id="legalName" width="40%">
                <tr>
                    <td><input type="text" id="fName" name="fName" size="15"
                        value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $fName ?>"></td>
                    <td><input type="text" id="mName" name="mName" size="8"
                        value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $mName ?>"></td>
                    <td><input type="text" id="lName" name="lName" size="15"
                        value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $lName ?>"></td>
                </tr>
                <tr>
                    <td><label for="fName">First Name</label></td>
                    <td><label for="mName">Middle Name</label></td>
                    <td><label for="lName">Last Name</label></td>
                </tr>
            </table>
            </div>

            <input type="text" id="prefName" name="prefName" size="15" default=""
            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $prefName ?>"><br>
            <label for="prefName">Preferred Name</label>
            <br>

            <!-- BIRTHDAY INFORMATION & OTHER PERSONAL INFO -->
            <h3>Birth Date</h3>
            <div class="bday">
                <select id="birthMonth" name="birthMonth">
               
                <option value="">--Month--</option>
                    <?php 
                    $birthMonth = array("January","February","March","April","May",
                                 "June","July","August","September","October",
                                 "November","December");
                    $j = count($birthMonth);
                    for($i = 0; $i < $j; $i++)
                    {
                        echo "<option value='$birthMonth[$i]'>$birthMonth[$i]</option>";
                    }
                    ?>
                </select>
           
                <select id="birthDay" name="birthDay" default="">
               
                    <option value="">--Day--</option>
                    <?php for($i = 1; $i <= 31; $i++)
                    {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
           
                <select id="birthYear" name="birthYear">
                              
                    <option value="">--Year--</option>
                    <?php for($i = 1945; $i <= $curr_year; $i++)
                    {
                    
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select><br>
            </div>

            <h3>Gender</h3>
            <select name="gender">
           
                <option value=""></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="decline">Prefer Not To Say</option>
            </select>


            <!-- ADDRESS INFO -->
            <h3>Address</h3>
            <input type="text" id="address1" name="address1" size="45"><br>
            <label for="address1">Street Address</label><br>
            <input type="text" id="address2" name="address2" size="45"><br>
            <label for="address2">Street Address Line 2</label>

            <table id="address" width="30%" >
                <tr>
                    <td><input type="text" id="city" name="city" size="15"></td>
                    <td><input type="text" id="state" name="state" size="15"></td>
                </tr>
                <tr>
                    <td><label for="city">City</label></td>
                    <td><label for="state">State/Province</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="zip" name="zip" size="10"></td>
                    <td>
                        <select id="country" name="country">
                        
                            <option></option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="zip">Zip Code</label></td>
                    <td><label for="state">Country</label></td>
                </tr>
            </table>

            <h3>Student E-mail</h3>
            <input type="text" name="email" placeholder="ex: username@example.com" size="30">


            <!-- PHONE NUMBERS -->
            <h3>Phone Number</h3>

            <!-- home or cell -->
            <input type="text" id="areaCode" name="areaCode" class="phone" maxlength="3" size="3"> - 
            <input type="text" id="phoneNum" name="phoneNum" class="phone" maxlength="8" size="7">
            <select id="phoneType" name="phoneType" class="phone">
            
                <option value="">TYPE</option>
                <option value="cell">Cell</option>
                <option value="home">Home</option>
            </select>

            <!-- work number -->
            <h3>Work Number</h3>
            <input type="text" id="areaCodeWork" name="areaCodeWork" class="workPhone" maxlength="3" size="3"> - 
            <input type="text" id="phoneNumWork" name="phoneNumWork" class="workPhone" maxlength="7" size="7">
    
            <h3>Company</h3>
            <input type="text" id="companyName" name="companyName">

            <h3>Courses</h3>
            <select name="courseChoice">
            
                    <option value="none"></option>
                    <?php
                        foreach($result as $output)
                        {
                        ?>
                            <option><?php echo $output['courseName'];?></option>
                        <?php
                        }
                    ?>
            </select>

            <h3>Additional Comments</h3>
            <textarea rows="4" cols="50" name="comments" placeholder="Enter text here..."></textarea><br>
            <button type="submit">SUBMIT</button>
            <button type="reset" value="reset">CLEAR</button><br>            
        </form>
</main>  
</body>
</html>