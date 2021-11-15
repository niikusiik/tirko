<?php
    include '../../assets/header.php';

//    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $query = "SELECT * FROM uzivatelia WHERE login='".$_POST['meno']."' AND heslo = '".$_POST['heslo']."'";
        $row = $mysql->query($query);
        $user = $row->fetch_assoc();

        if($_POST['meno'] == $user['login'] && $_POST['heslo'] == $user['heslo']) {

            $_SESSION['username'] = $user['login'];
            $_SESSION['meno'] = $user['meno'];
            $_SESSION['rola'] = $user['rola'];
            $_SESSION['login'] = true;

            header('Location: ../uzivatelia/index.php');
            exit();

        } else {
            $chyba = true;
        }
//        foreach ($users as $user) {
//
//            list($username, $pass, $name, $type) = explode('::', $user);
//
//            if($_POST['meno'] == $username && $_POST['heslo'] == $pass) {
//
//                $_SESSION['meno'] = $_POST['meno'];
//                $_SESSION['login'] = true;
//
//                header('Location: ../aktuality/index.php');
//                exit();
//            }
//            else {
//                $chyba = true;
//            }

//        }

    }

?>

<body class="bg-black">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#">Prax</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <?php
            $aktivnaStranka = basename($_SERVER['SCRIPT_NAME'],'.php');
            $menu = [];
            $riadky=file('../../../public/assets/menu.txt',FILE_SKIP_EMPTY_LINES);

            foreach ($riadky as $riadok) {
                list($k,$h)=explode('::', $riadok);
                $menu[$k]=$h;
            }
            foreach ($menu as $kluc => $hodnota) {
                echo '
                        <li class="nav-item">
                        <a class="nav-link '.($aktivnaStranka == $kluc? "active":"").'" href="../../../public/theme/'.$kluc.'/index.php">' .$hodnota . '</a>
                        </li>';
            }
            ?>
        </ul>

</nav>
<div class="container">
    <div class="login bg-dark">
    <h1 class="text-center">Prihlásenie</h1>
    <?php
        if(isset($chyba)) {
            echo '<div class="alert alert-info" role="alert">
            Nesprávne meno alebo heslo!
        </div>';
            unset($chyba);
        }
    ?>

    <form class="was-validated" action="index.php" method="POST">
        <div class="form-group">
            <label for="i1"><b>Meno</b></label>
            <input type="text" id="i1" name="meno" class="form-control" placeholder="Zadaj meno..." required>
            <div class="invalid-feedback">
                Prosíme vyplniť túto položku.
            </div>
        </div>
        <div class="form-group">
            <label for="i2"><b>Heslo</b></label>
            <input type="password" pattern=".{5,}" id="i2" name="heslo" class="form-control" placeholder="Zadaj heslo..." required>
            <div class="invalid-feedback">
                Prosíme zadajte heslo. Musí obsahovať aspoň 5 znakov!
            </div>
        </div>
        <button type="submit" class="btn btn-outline-info">Prihlásiť sa</button>
        <br>
        <br>
        <a href="#">Zabudol som heslo</a><br>
        <a href="#">Registrácia</a>
    </form>

    </div>

</div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
</body>
</html>