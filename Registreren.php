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
            <div id="register_container">
                <h3>Registreren:</h3>
                <p>
                    Vul de onderstaande gegevens in om een account aan te maken. <br>
                    Heb je al een account? Probeer dan om <a href="Inloggen.php" style="text-decoration: underline;">in te loggen</a>.
                </p>
                <form method="POST" action="Elementen/RegisterAction.php">
                    <input type="hidden" name="regidate" value="<?php echo date("Y-m-d"); ?>">
                    <input type="email" class="regiform_text" name="email" placeholder="E-mailadress">
                    <input type="text" onfocus="(this.type='date')" class="regiform_text" name="birthdate" placeholder="Geboortedatum">
                    <input type="text" class="regiform_text" name="username" placeholder="Gebruikersnaam">
                    <input type="password" class="regiform_text" name="password" placeholder="Wachtwoord">
                    <input type="password" class="regiform_text" name="password-repeat" placeholder="Herhaal wachtwoord"> </br>
                    <input type="submit" class="regiform_button" name="submit" placeholder="Verzenden">
                    <input type="reset" class="regiform_button" name="reset" placeholder="Reset Formulier">
                </form>
            </div>
        </div>
        <div id="rocgames_footer">ROC Games ® - 2019 </div>
    </div>
</body>

</html>