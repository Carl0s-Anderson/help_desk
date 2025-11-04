<?Php
session_start();
if (!isset($_SESSION['Autenticado']) || $_SESSION['Autenticado'] != 'sim') {
    header('location: index.php?login=erro2');
}
?>