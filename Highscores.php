<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Tab-Title -->
    <title>ROC Games</title>

    <!-- Link Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">

    <!-- link Custom CSS -->
    <link rel="stylesheet" type="text/css" href="CSS/ROC_Games_CSS.css">
</head>

<body>
    <!-- Main Container -->
    <div class="container">
        <!-- Navigation/Header -->
        <?php
            $subpage = false;
            include 'Elementen/Navigation.php';
        ?>
        <!-- Game Collection -->
        <div class="game_container">
            <h3 id="scoreH3">Hoogste scores wereldwijd:</h3>
            <table>
                <thead>
                    <tr>
                        <th class="highscoreTH">Tetris:</th>
                        <th class="highscoreTH">Pong:</th>
                        <th class="highscoreTH">Breakout:</th>
                        <th class="highscoreTH">Snake:</th>
                        <th class="highscoreTH">FlappyBird:</th>
                        <th class="highscoreTH">Memory:</th>
                        <th class="highscoreTH">Simon:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "roc-games";
                        
                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        
                        $sql = "SELECT MAX(scoreTetris), MAX(scorePong), MAX(scoreBreakout), MAX(scoreSnake), MAX(scoreFlappyBird), MIN(scoreMemory), MAX(scoreSimon) FROM `scores` LIMIT 1";
                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) 
                        {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<tr>';
                                    echo '<td class="highscoreTD">';
                                        echo $row["MAX(scoreTetris)"];
                                    echo '</td>';
                                    echo '<td class="highscoreTD">';
                                        echo $row["MAX(scorePong)"];
                                    echo '</td>';
                                    echo '<td class="highscoreTD">';
                                        echo $row["MAX(scoreBreakout)"];
                                    echo '</td>';
                                    echo '<td class="highscoreTD">';
                                        echo $row["MAX(scoreSnake)"];
                                    echo '</td>';
                                    echo '<td class="highscoreTD">';
                                        echo $row["MAX(scoreFlappyBird)"];
                                    echo '</td>';
                                    echo '<td class="highscoreTD">';
                                        echo $row["MIN(scoreMemory)"]/40 . " sec.";
                                    echo '</td>';
                                    echo '<td class="highscoreTD">';
                                        echo $row["MAX(scoreSimon)"];
                                    echo '</td>';
                                echo '</tr>';
                            }
                        } 
                        else 
                        {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                    ?>
                </tbody>
            </table>

            <h3 id="yourScoreH3">Uw hoogst behaalde scores:</h3>
            <table>
                <thead>
                    <tr>
                        <th class="highscoreTH">Tetris:</th>
                        <th class="highscoreTH">Pong:</th>
                        <th class="highscoreTH">Breakout:</th>
                        <th class="highscoreTH">Snake:</th>
                        <th class="highscoreTH">FlappyBird:</th>
                        <th class="highscoreTH">Memory:</th>
                        <th class="highscoreTH">Simon:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($_SESSION['logged-in'])) 
                        {
                            $sql = "SELECT scoreTetris, scorePong, scoreBreakout, scoreSnake, scoreFlappyBird, scoreMemory, scoreSimon FROM `scores` WHERE scoreUser='". $_SESSION["username"] ."'";
                            $result = mysqli_query($conn, $sql);
                            
                            if (mysqli_num_rows($result) > 0) 
                            {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) 
                                {
                                    echo '<tr>';
                                        echo '<td class="highscoreTD">';
                                            echo $row["scoreTetris"];
                                        echo '</td>';
                                        echo '<td class="highscoreTD">';
                                            echo $row["scorePong"];
                                        echo '</td>';
                                        echo '<td class="highscoreTD">';
                                            echo $row["scoreBreakout"];
                                        echo '</td>';
                                        echo '<td class="highscoreTD">';
                                            echo $row["scoreSnake"];
                                        echo '</td>';
                                        echo '<td class="highscoreTD">';
                                            echo $row["scoreFlappyBird"];
                                        echo '</td>';
                                        echo '<td class="highscoreTD">';
                                            echo $row["scoreMemory"]/40 . " sec.";
                                        echo '</td>';
                                        echo '<td class="highscoreTD">';
                                            echo $row["scoreSimon"];
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            } 
                            else 
                            {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                        }
                        else
                        {
                            echo '<tr>';
                                echo '<td class="highscoreTD" colspan="9">';
                                    echo "Je scores worden pas bijgehouden als je bent <a href='inloggen.php' style='text-decoration: underline; color: #4422ee'>ingelogged<a/>.";
                                echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
            <?php
                if(isset($_POST["searchScoreUser"]) && isset($_SESSION["logged-in"]))
                {
                    $usernameSearchRvdv = $_POST["usernameSearch"];

                    $sql = "SELECT scoreTetris, scorePong, scoreBreakout, scoreSnake, scoreFlappyBird, scoreMemory, scoreSimon FROM `scores` WHERE scoreUser='". $usernameSearchRvdv ."'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) 
                    {
                        while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo '<h3 id="yourScoreH3">Hoogste scores van: '. $usernameSearchRvdv .'</h3>';
                                echo '<table>';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th class="highscoreTH">Tetris:</th>';
                                            echo '<th class="highscoreTH">Pong:</th>';
                                            echo '<th class="highscoreTH">Breakout:</th>';
                                            echo '<th class="highscoreTH">Snake:</th>';
                                            echo '<th class="highscoreTH">FlappyBird:</th>';
                                            echo '<th class="highscoreTH">Memory:</th>';
                                            echo '<th class="highscoreTH">Simon:</th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                        echo '<tr>';
                                            echo '<td class="highscoreTD">';
                                                echo $row["scoreTetris"];
                                            echo '</td>';
                                            echo '<td class="highscoreTD">';
                                                echo $row["scorePong"];
                                            echo '</td>';
                                            echo '<td class="highscoreTD">';
                                                echo $row["scoreBreakout"];
                                            echo '</td>';
                                            echo '<td class="highscoreTD">';
                                                echo $row["scoreSnake"];
                                            echo '</td>';
                                            echo '<td class="highscoreTD">';
                                                echo $row["scoreFlappyBird"];
                                            echo '</td>';
                                            echo '<td class="highscoreTD">';
                                                echo $row["scoreMemory"]/40 . " sec.";
                                            echo '</td>';
                                            echo '<td class="highscoreTD">';
                                                echo $row["scoreSimon"];
                                            echo '</td>';
                                        echo '</tr>';
                                    echo '</tbody>';
                                echo '</table>';       
                            }
                    }
                    else
                    {
                        echo "De aangevraagde gebruiker bestaat niet. ";
                    }
                }
            ?>
            <h3 id="yourScoreH3">Zoek een gebruiker:</h3>
            <?php
                if (!isset($_SESSION["logged-in"])) {
                    echo "<p>Deze functie werkt alleen als je bent <a href='inloggen.php' style='text-decoration: underline; color: #4422ee'>ingelogged<a/> in je account.</p>";
                }
            ?>
            <form method="POST" action="Highscores.php">
                <input type="text" name="usernameSearch" placeholder="Typ een gebruikersnaam in" style="width: 75%; padding: 1% 0% 1% 0.5%">
                <input type="submit" name="searchScoreUser" placeholder="Zoeken" style="padding: 1% 0.5% 1% 0.5%">
            </form>
        </div>
        <div id="rocgames_footer">ROC Games ® - 2019 </div>
    </div>
</body>

</html>