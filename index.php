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
    <div class="container rightslide">
        <!-- Navigation/Header -->
        <?php
            $subpage = false;
            include 'Elementen/Navigation.php';
        ?>
        <!-- Game Collection -->
        <div class="game_container">
            <?php
                if ($loginRvdv == true) {
                    echo '<div class="loggedin_container" id="loggedin_as">';
                        echo "Je bent ingelogd als:<strong> ". $userNameRvdv ."</strong>";
                    echo '</div>';
                }
                include 'Elementen/GetGames.php';
            ?>
        </div>
        <div id="rocgames_footer">ROC Games ® - 2019 </div>
    </div>
</body>

</html>