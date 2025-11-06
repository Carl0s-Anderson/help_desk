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
        array('id' => '1', 'email' => 'admteste@gmail.com', 'senha' => '123', 'perfil_id' =>1 ),
        array('id' => '2', 'email' => 'user@gmail.com', 'senha' => '123', 'perfil_id' =>1 ),
        array('id' => '3', 'email' => 'carlos@gmail.com', 'senha' => '123', 'perfil_id' => 2 ),
        array('id' => '4', 'email' => 'anderson@gmail.com', 'senha' => '123', 'perfil_id' => 2 ),

    );
    /*
    echo '<pre>';
    echo print_r($usuaraio_app);
    echo '</pre>';
    print_r($_POST);
    */

    //verifica se autenticaçao foi realizada
    $usuario_autenticado = false;
    $usuaraio_id = null;

    $perfis = array(1 => 'administrativo', 2 => 'usuario');

    foreach ($usuaraio_app as $user) {
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuaraio_id = $user['id'];
            $usuaraio_perfil_id = $user['perfil_id'];
        }
    }
    if ($usuario_autenticado) {
        //echo ' usuario autenticado ';
        $_SESSION['Autenticado'] = 'sim';
        $_SESSION['id'] =   $usuaraio_id;
        $_SESSION['perfil_id'] = $usuaraio_perfil_id;
        header('location: home.php');
    } else {
        $_SESSION['Autenticado'] = 'NAO';
        header('location: index.php?login=erro');
    }

    ?>


</body>

</html>