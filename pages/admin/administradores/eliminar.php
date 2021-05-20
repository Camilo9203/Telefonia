<?php
include_once('../../../db/db_utilidades.php');
include_once('../../layouts/head.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}
header('Location: index.php');
$id = isset($_GET['id']) ? $_GET['id'] : 0;
borrar_administradores($id);
