<!DOCTYPE html>
<html>
<head>
    <title>Registreren...</title>
</head>
<body>
    <?php
        if (isset($_POST['submit'])) 
        {
            $usernameRvdv = "";
            $passwordRvdv = "";
            $emptyFieldsRvdv = "";

            //Check if username is empty
            if(!empty($_POST['username']))
            {   $usernameRvdv = $_POST['username'];}
            else{   $emptyFieldsRvdv = "gebruikersnaam of email";    }

            //Check if password is empty
            if(!empty($_POST['password']))
            {   $passwordRvdv = $_POST['password'];}
            else{   $emptyFieldsRvdv = "wachtwoord"; }

            // Giving feedback about checking password or username
            if($emptyFieldsRvdv == "gebruikersnaam of email" || $emptyFieldsRvdv == "wachtwoord")
            {
                echo '<script>';
                    echo 'if(alert("Je bent je '. $emptyFieldsRvdv .' niet ingevuld."))';
                    echo '{';
                        // Do Nothing
                    echo '}';
                    echo 'window.location.href = "../Inloggen.php"';
                echo '</script>';
            }
            else
            {
                // Database variables
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "roc-games";

                // Create a database connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Checking database connection
                if (!$conn) 
                {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT userPassword, userUsername FROM users WHERE (userUsername = '". $usernameRvdv ."' OR userEmail = '". $usernameRvdv ."')";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) 
                {
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        if(password_verify($passwordRvdv, $row["userPassword"]))
                        {
                            session_start();
                            $_SESSION["logged-in"] = true;
                            $_SESSION["username"] = $row['userUsername'];
                            $_SESSION["password"] =  $row["userPassword"];
                            echo '<script>';
                                echo 'window.location.href = "../index.php"';
                            echo '</script>';
                        }
                        else 
                        {
                            echo '<script>';
                                echo 'if(alert("Je wachtwoord en gebruikersnaam komen niet overeen."))';
                                echo '{';
                                    // Do Nothing
                                echo '}';
                                echo 'window.location.href = "../Inloggen.php"';
                            echo '</script>';
                        }
                    }
                }    
                else
                {
                    echo '<script>';
                                echo 'if(alert("'. $usernameRvdv .' is geen geregistreerde gebruikersnaam of emailadress"))';
                                echo '{';
                                    // Do Nothing
                                echo '}';
                                echo 'window.location.href = "../Inloggen.php"';
                            echo '</script>';
                }

                mysqli_close($conn);
            }
        } 
        else 
        {
            echo '<script>';
                echo 'window.location.href = "../Login.php"';
            echo '</script>';
        }
    ?>
</body>
</html>