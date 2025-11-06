<?Php
require_once "validador_acesso.php";
?>
<?php
$chamados = array();
$arquivo =  fopen('arquivo.hd', 'r');

while (!feof($arquivo)) {
  $resgistro = fgets($arquivo);

  // Evita adicionar linhas em branco, caso existam
  if (empty(trim($resgistro))) {
    continue;
  }

  $chamado_dados = explode('-', $resgistro);

  // ---LÓGICA DE FILTRO VAI AQUI ---

  // Identifica se o usuário é admin (vamos supor que admin é perfil 1)
  $usuario_eh_admin = ($_SESSION['perfil_id'] == 1);

  // Identifica se o usuário é padrão
  $usuario_eh_padrao = ($_SESSION['perfil_id'] == 2);

  // Pega o ID do usuário que criou o chamado
  // (Também é uma boa ideia validar se $chamado_dados[0] existe)
  $id_do_criador_do_chamado = $chamado_dados[0];

  // CONDIÇÃO PARA ADICIONAR:
  // 1. Se o usuário for admin...
  // OU
  // 2. Se o usuário for padrão E o ID dele for igual ao ID do criador do chamado...

  if ($usuario_eh_admin || ($usuario_eh_padrao && $_SESSION['id'] == $id_do_criador_do_chamado)) {

    // ...então, adicione o registro ao array.
    $chamados[] = $resgistro;
  }
}

fclose($arquivo);

?>
<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="imgs/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="logoff.php">Desconectar</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">

            <?php foreach ($chamados as $chamado): ?>
              <?php
              $chamado_dados = explode('-', $chamado);
              if (count($chamado_dados) < 4) {
                continue;
              }
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                  <p class="card-text"><?= $chamado_dados[3] ?></p>

                </div>
              </div>
            <?php endforeach; ?>
            <div class="row mt-5">
              <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>