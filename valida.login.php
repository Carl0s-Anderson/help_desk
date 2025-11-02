<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Help Desk</title>
</head>

<body>
    <?php
    /*
    print_r($_GET);

    echo '<br>';

    echo $_GET ['email'];
    echo '<br>';
    echo $_GET ['senha'];
    */

    $usuaraio_app = array(
        array('email' => 'admteste@gmail.com', 'senha' => '123'),
        array('email' => 'user@gmail.com', 'senha' => '123'),

    );
    /*
    echo '<pre>';
    echo print_r($usuaraio_app);
    echo '</pre>';
    print_r($_POST);
    */

    //verifica se autenticaçao foi realizada
    $usuario_autenticado = false;

    foreach ($usuaraio_app as $user) {
           if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
        }
        if ($usuario_autenticado) {
            echo 'usuario autenticado';
        } else {
           header('location: index.php?login=erro');
        }
        /*
        echo 'Usuaraio: ' .   $user['email'] . '/' .  $user['senha'];
        echo 'Usuaraioform: ' .   $_POST['email'] . '/' .  $_POST['senha'];
        */
     

        $user['email'];
        $user['senha'];
        echo '<hr>';
        echo $_POST['email'];
        echo '<br>';
        echo $_POST['senha'];
    }
    $user['email'];
    $user['senha'];
    echo '<hr>';
    echo $_POST['email'];
    echo '<br>';
    echo $_POST['senha'];
    echo '<br>';
    echo $_POST['email'];
    echo '<br>';
    echo $_POST['senha'];
    ?>

</body>

</html>