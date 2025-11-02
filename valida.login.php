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
    session_start();
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
            break;
        }
    }
    if ($usuario_autenticado) {
        echo ' usuario autenticado ';
        $_SESSION['Autenticado'] = 'sim';
    } else {
           $_SESSION['Autenticado'] = 'NAO';
        header('location: index.php?login=erro');
    }

    ?>


</body>

</html>