<?php
include_once('../../../db/db_utilidades.php');
include_once('../../layouts/head.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}
// header('Location: index.php');

//TODO: Continuar codigo
$id = isset($_GET['serial']) ? $_GET['serial'] : 0;
$celular = traer_celulares_por_id($id);
$directorio = "../../../assets/celulares/";
$archivo = $directorio . $celular['imagen'];
// Borrar Archivo de Imagen
unlink($archivo);
borrar_celular($id);
