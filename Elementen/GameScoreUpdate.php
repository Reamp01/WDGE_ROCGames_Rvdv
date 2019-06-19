<?php
    if (isset($_REQUEST["game"]) && isset($_REQUEST["score"])) 
    {
        // Declairing variables
        $gameRvdv = $_REQUEST["game"];
        $scoreRvdv = $_REQUEST["score"];
        if(isset($_REQUEST["memory"]))
        {
            $memoryRvdv = $_REQUEST["memory"];
        }
        if(isset($_REQUEST["rps"]))
        {
            $rpsRvdv = $_REQUEST["rps"];
        }

        // Check if user is logged in
        session_start();
        if(isset($_SESSION['logged-in']))
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

            $sql = "SELECT score". $gameRvdv ." FROM scores WHERE scoreUser='". $_SESSION["username"] ."'";
            $result = mysqli_query($conn, $sql);

            $selectResultRvdv = mysqli_num_rows($result);

            if ($selectResultRvdv >= 0) 
            {
                $row = mysqli_fetch_assoc($result);
                if($scoreRvdv > $row["score". $gameRvdv] && !isset($memoryRvdv))
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

                    $sql = "UPDATE scores SET score". $gameRvdv ." = ". $scoreRvdv ." WHERE scoreUser = '". $_SESSION["username"] ."'";
                    if (mysqli_query($conn, $sql)) 
                    {
                        echo "Record updated successfully";
                    } 
                    else 
                    {
                        die("Error updating record: " . mysqli_error($conn));
                    }
                }
                elseif(isset($memoryRvdv))
                {
                    if($scoreRvdv < $row["score". $gameRvdv])
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

                        $sql = "UPDATE scores SET score". $gameRvdv ." = ". $scoreRvdv ." WHERE scoreUser = '". $_SESSION["username"] ."'";
                        if (mysqli_query($conn, $sql)) 
                        {
                            echo "Record updated successfully";
                        } 
                        else 
                        {
                            die("Error updating record: " . mysqli_error($conn));
                        }
                    }
                    elseif($row["score". $gameRvdv] == 0)
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

                        $sql = "UPDATE scores SET score". $gameRvdv ." = ". $scoreRvdv ." WHERE scoreUser = '". $_SESSION["username"] ."'";
                        if (mysqli_query($conn, $sql)) 
                        {
                            echo "Record updated successfully";
                        } 
                        else 
                        {
                            die("Error updating record: " . mysqli_error($conn));
                        }
                    }
                }
            }
            mysqli_close($conn); 
        }
        header('Location: ../Games/'. $gameRvdv .'/'. $gameRvdv .'.php');
    }
    else
    {
        header('Location: ../Games/index.php');
    }
?>