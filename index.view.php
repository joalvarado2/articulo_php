<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <div class="contenedor">
        <h1>Articulos</h1>
        <section class="articulos">
            <ul>               
                <?php foreach ($articulos as $articulo) : ?>
                    <li><?php echo $articulo['id'] . '.-' . $articulo['articulo'] ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="paginacion">
            <ul>
                <!-- ESTABLECEMOS CUANDO EL BOTON ANTERIOR ESTARÁ DESABILITADO -->
                <?php if ($pagina == 1) : ?>
                    <li class="disable">&laquo;</li>
                <?php else : ?>
                    <li><a href="?pagina= <?php echo $pagina - 1 ?>">&laquo;</a></li>
                <?php endif; ?>

               <!--  EJECUTAMOS UN CICLO PARA MOSTRAR LAS PÁGINAS -->
                <?php
                for ($i = 1; $i <= $numeroPaginas; $i++) {
                    if ($pagina == $i) {
                        echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                    } else {
                        echo "<li><a href='?pagina =$i'>$i</a></li>";
                    }
                }
                ?>

                <!-- ESTABLECEMOS CUANDO EL BOTON DE SIGUIENTE ESTARA DESABILITADO -->
                <?php if ($pagina == $numeroPaginas) : ?>
                    <li class="disable">&laquo;</li>
                <?php else : ?>
                    <li><a href="?pagina= <?php echo $pagina + 1 ?>">&raquo;</a></li>
                <?php endif; ?>

            </ul>
        </section>
    </div>
</body>

</html>