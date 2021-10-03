<?php include __DIR__ . '/begin.php'; ?>

<div class="container mt-3">
    

    <?php 
    
    foreach ($usuario as $banco) {
        $dataAno[] = $banco['data_ano'];
    }
    
    $dataAno = array_unique($dataAno);

    var_dump($dataAno);
    
    

    ?>


    <?php //var_dump($usuario); ?>

</div>

<?php include __DIR__ . '/end.php'; ?>