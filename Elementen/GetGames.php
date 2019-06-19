<?php
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

    $sql = "SELECT * FROM games";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) 
    {
        $loopCounterRvdv = 0;
        foreach($result as $key => $game) 
        {
            $loopCounterRvdv++;
            if($loopCounterRvdv == 1 || $loopCounterRvdv == 4 || $loopCounterRvdv == 7)
            {
                if($loopCounterRvdv == 4)
                {
                    $slideAnimationRvdv = "leftslide";
                }
                else
                {
                    $slideAnimationRvdv = "rightslide";
                }
                echo '<div class="row justify-content-around '. $slideAnimationRvdv .'">';
            }
            echo '<div class="col-lg-4">';
                echo '<div class="card custom_card" style="width: 18rem;">';
                    echo '<img class="card-img-top custom_gameimg" src="img/Games/'. $game["gameName"] .'.jpg" alt="Card image cap">';
                    echo '<div class="card-body">';
                        echo '<h5 class="card-title">'. $game["gameName"] .'</h5>';
                        echo '<p class="card-text">';
                            echo $game["gameDescription"];
                        echo '</p>';
                        echo '<a href="Games/'. $game["gameName"] .'/'. $game["gameName"] .'.php" class="btn btn-primary">Speel '. $game["gameName"] .'</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            if($loopCounterRvdv == 3 || $loopCounterRvdv == 6 || $loopCounterRvdv == 9)
            {
                echo '</div>';
            }
        }
    }
?>