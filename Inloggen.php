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
            <div id="login_container">
                <h3>Inloggen:</h3>
                <p>
                    Vul de onderstaande gegevens in om in te loggen. <br>
                    Heb je nog geen account? Probeer dan om te <a href="Registreren.php" style="text-decoration: underline;">registreren</a>.
                </p>
                <form action="Elementen/LoginAction.php" method="POST">
                    <input type="text" class="loginform_text" name="username" placeholder="Gebruikersnaam of e-mail">
                    <input type="text" class="loginform_text" name="password" placeholder="Wachtwoord"> </br>
                    <input type="submit" class="loginform_button" name="submit" placeholder="Verzenden">
                    <input type="reset" class="loginform_button" name="reset" placeholder="Reset Formulier">
                </form>
            </div>
        </div>
        <div id="rocgames_footer">ROC Games ® - 2019 </div>
    </div>
</body>

</html>