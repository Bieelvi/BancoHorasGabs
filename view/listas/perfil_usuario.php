<?php include_once __DIR__ . '/../begin.php'; ?>

<?php 
    if (isset($_SESSION['logado'])){
        var_dump($_SESSION['logado']);
        var_dump($_SESSION['usuario']);
    }
?>

<?php include_once __DIR__ . '/../end.php'; ?>