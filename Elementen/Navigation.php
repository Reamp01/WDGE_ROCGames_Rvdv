<?php
    if($subpage == false)
    {
        echo '<nav id="Darkblue_Navigation" class="navbar navbar-expand-lg navbar-dark bg-dark">';
            echo '<a class="navbar-brand" href="Index.php">';
                echo ' <img id="nav_icon" src="img/Logo/ROC_Games_LOGO_Crop.png">';
            echo '</a>';
            echo '<button class="navbar-toggler" id="collapse_navicon" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
                echo '<span class="navbar-toggler-icon"></span>';
            echo '</button>';
            echo '<div class="collapse navbar-collapse" id="navbarNav">';
                echo '<ul class="navbar-nav">';
                    echo '<li class="nav-item active">';
                        echo '<a class="nav-link" href="Index.php">Games</a>';
                    echo '</li>';
                    echo '<li class="nav-item active">';
                        echo '<a class="nav-link" href="Highscores.php">Highscores</a>';
                    echo '</li>';
                        session_start();
                        if(!isset($_SESSION['logged-in']))
                        {
                            $loginRvdv = false;
                            ?>
                            <li class="nav-item active">
                            <a class="nav-link" href="Inloggen.php">Inloggen</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="Registreren.php">Registreren</a>
                            </li>
                            <?php
                        }
                        else
                        {
                            $userNameRvdv = $_SESSION['username'];
                            $loginRvdv = true;
                            echo '<a class="nav-link" href="Elementen/LoggingOut.php">Uitloggen</a>';
                        }
                echo '</ul>';
            echo '</div>';
        echo '</nav>';
    }
    elseif($subpage == true)
    {
        echo '<nav id="Darkblue_Navigation" class="navbar navbar-expand-lg navbar-dark bg-dark">';
            echo '<a class="navbar-brand" href="../../Index.php">';
                echo ' <img id="nav_icon" src="../../img/Logo/ROC_Games_LOGO_Crop.png">';
            echo '</a>';
            echo '<button class="navbar-toggler" id="collapse_navicon" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">';
                echo '<span class="navbar-toggler-icon"></span>';
            echo '</button>';
            echo '<div class="collapse navbar-collapse" id="navbarNav">';
                echo '<ul class="navbar-nav">';
                    echo '<li class="nav-item active">';
                        echo '<a class="nav-link" href="../../Index.php">Games</a>';
                    echo '</li>';
                    echo '<li class="nav-item active">';
                        echo '<a class="nav-link" href="../../Highscores.php">Highscores</a>';
                    echo '</li>';
                        session_start();
                        if(!isset($_SESSION['logged-in']))
                        {
                            $loginRvdv = false;
                            ?>
                            <li class="nav-item active">
                            <a class="nav-link" href="../../Inloggen.php">Inloggen</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="../../Registreren.php">Registreren</a>
                            </li>
                            <?php
                        }
                        else
                        {
                            $userNameRvdv = $_SESSION['username'];
                            $loginRvdv = true;
                            echo '<a class="nav-link" href="../../Elementen/LoggingOut.php">Uitloggen</a>';
                        }
                echo '</ul>';
            echo '</div>';
        echo '</nav>';
    }
?>