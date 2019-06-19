<!DOCTYPE html>
<html>
<head>
    <title>Registreren...</title>
</head>
<body>
    <?php
        if (isset($_POST['submit'])) 
        {
            // Declare Variables
            $regiDateRvdv = "";
            $emailAdressRvdv = "";
            $birthDateRvdv = "";
            $UsernameRvdv = "";
            $passwordRvdv = "";
            $passwordRepeatRvdv = "";
            $emptyFieldsRvdv = 0;

            //Check if email is empty
            if(!empty($_POST['email']))
            {   $emailAdressRvdv = $_POST['email'];}
            else{   $emptyFieldsRvdv++; }

            //Check if birthDate is empty
            if(!empty($_POST['birthdate']))
            {   $birthDateRvdv = $_POST['birthdate'];}
            else{   $emptyFieldsRvdv++; }

            //Check if Username is empty
            if(!empty($_POST['username']))
            {   $UsernameRvdv = $_POST['username'];}
            else{   $emptyFieldsRvdv++; }

            //Check if Password is empty
            if(!empty($_POST['password']))
            {   $passwordRvdv = $_POST['password'];}
            else{   $emptyFieldsRvdv++; }

            //Check if Password Repeat is empty
            if(!empty($_POST['password-repeat']))
            {   $passwordRepeatRvdv = $_POST['password-repeat'];}
            else{   $emptyFieldsRvdv++; }

            //Check if Password Repeat is empty
            if(!empty($_POST['regidate']))
            {   $regiDateRvdv = $_POST['regidate'];}
            else{   $emptyFieldsRvdv++; }

            if($passwordRvdv != $passwordRepeatRvdv)
            {
                echo '<script>';
                    echo 'if(alert("Je wachtwoorden zijn niet hetzelfde."))';
                    echo '{';
                        // Do nothing
                    echo '}';
                    echo 'window.location.href = "../Registreren.php"';
                echo '</script>';
            }
            elseif ($emptyFieldsRvdv == 0) 
            {
                // Declaring database variables
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "roc-games";

                // Create database connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Check database connection
                if (!$conn) 
                {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM users WHERE (userUsername = '". $UsernameRvdv ."' OR userEmail = '". $emailAdressRvdv ."')";
                $result = mysqli_query($conn, $sql);

                if (!mysqli_num_rows($result) > 0) 
                {
                    // Hash password before putting it in database
                    $hashPasswordRvdv = password_hash($passwordRvdv, PASSWORD_DEFAULT);

                    // Make a sql-statement for database
                    $sql = "INSERT INTO `users` (UserID, UserUsername, UserPassword, UserEmail, UserBirthdate, UserRegidate)
                    VALUES (null, '". $UsernameRvdv ."', '". $hashPasswordRvdv ."', '". $emailAdressRvdv ."', '". $birthDateRvdv ."', '". $regiDateRvdv ."')";

                    // Check if sql gives an error
                    if (mysqli_query($conn, $sql)) 
                    {
                        // Declaring database variables
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "roc-games";

                        // Create database connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        // Check database connection
                        if (!$conn) 
                        {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Make a sql-statement for database
                        $sql = "INSERT INTO `scores` VALUES (null, 0, 0, 0, 0, 0, null, 0, '". $UsernameRvdv ."')";

                        // Check if sql gives an error
                        if (mysqli_query($conn, $sql)) 
                        {
                            echo '<script>';
                            echo 'if(alert("Je account is succesvol aangemaakt."))';
                            echo '{';
                                // Do nothing
                            echo '}';
                            echo 'window.location.href = "../Inloggen.php"';
                            echo '</script>';
                        } 
                        else 
                        {
                            echo '<script>';
                            echo 'if(alert("Er ging iets niet goed."))';
                            echo '{';
                                // Do nothing
                            echo '}';
                            echo 'window.location.href = "../Registreren.php"';
                            echo '</script>';
                        }
                    } 
                    else 
                    {
                        echo '<script>';
                        echo 'if(alert("Er ging iets niet goed."))';
                        echo '{';
                            // Do nothing
                        echo '}';
                        echo 'window.location.href = "../Registreren.php"';
                        echo '</script>';
                    }
                    mysqli_close($conn);
                }
                else
                {
                    echo '<script>';
                        echo 'if(alert("De gebruikersnaam of email die je hebt opgegeven zijn al gelinkt aan een account."))';
                        echo '{';
                            // Do nothing
                        echo '}';
                        echo 'window.location.href = "../Inloggen.php"';
                        echo '</script>';
                }
            } 
            else 
            {
                echo '<script>';
                    echo 'if(confirm("Je bent: '. $emptyFieldsRvdv .' verplicht(en) veld(en) vergeten in te vullen."))';
                    echo '{';
                        // Do nothing
                    echo '}';
                    echo 'window.location.href = "../Registreren.php"';
                echo '</script>';
            }
        } 
        else 
        {
            echo '<script>';
                echo 'window.location.href = "../Registreren.php"';
            echo '</script>';
        }
    ?>
</body>
</html>