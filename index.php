<?php

try {
    $conexion = new PDO("mysql:host=localhost;dbname=paginacion", "root", "");
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    die();
}

$pagina = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;        // si la variable _Get esta setiada (tienen un valor) entonces queremos el entero si no dejamos 1
$postPorPagina = 5;

$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

//CONSULTA SQL
$articulos = $conexion->prepare("
    SELECT SQL_CALC_FOUND_ROWS * FROM articulos
    LIMIT $inicio, $postPorPagina");

$articulos->execute();
$articulos = $articulos->fetchAll();

if (!$articulos) {
    header("Location: index.php");
}

$totalArticulos = $conexion->query("SELECT FOUND_ROWS() as total");
$totalArticulos = $totalArticulos->fetch()["total"];

$numeroPaginas = ceil($totalArticulos / $postPorPagina);

require "index.view.php";





?>