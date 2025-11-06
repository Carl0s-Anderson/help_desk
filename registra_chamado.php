<?php
session_start();




$titulo = str_replace('-', '#', $_POST['titulo']);
$categoria = str_replace('-', '#', $_POST['categoria']);
$descrição = str_replace('-', '#', $_POST['descrição']);

/*
$dados = [$_POST['titulo'], $_POST['categoria'], $_POST['descricao']];
$texto = implode(' - ', $dados) . PHP_EOL;
*/

$texto = $_SESSION['id']. ' - ' . $titulo . ' - ' .  $categoria . ' - ' .  $descrição . PHP_EOL;

$arquivo =  fopen('arquivo.hd', 'a');

fwrite($arquivo, $texto);

fclose($arquivo);
header('location: consultar_chamado.php');
