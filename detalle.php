<?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    $volver = "pedido.php";
    include 'include/header.php';
?>
<section id="book-a-table" class="book-a-table book-a-table-padding">
    <div class="text-center">
        <h1>Detalle de tu pedido</h1>
    </div>
    <?php include 'include/detalle.php' ?>
</section>

<?php include 'include/footer.php' ?>