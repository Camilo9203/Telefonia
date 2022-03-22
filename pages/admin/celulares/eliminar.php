<?php
include_once('../../../db/db_utilidades.php');
include_once('../../layouts/head.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}
// header('Location: index.php');

//Capturar serial por get.
$serial = isset($_GET['serial']) ? $_GET['serial'] : 0;
//Traer Celular a borrar
$celular = traer_celulares_por_id($serial);
//Directorio de imagenes celulares subidos
$directorio = "../../../assets/celulares/";
//Archivo
$archivo = $directorio . $celular['imagen'];
// Borrado de archivo
unlink($archivo);
//Borrar celular base de datos.
borrar_celular($serial);

