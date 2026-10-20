<?php
require __DIR__ . '/../modelo/Modelo.php';
$modelo = new Modelo();

if (isset($_POST['accion'])) {
    $id = (int) ($_POST['id'] ?? 0);
    if ($_POST['accion'] == 'eliminar') $modelo->eliminar($id);
    elseif ($id) $modelo->actualizar($id, $_POST['nombre'], $_POST['precio']);
    else $modelo->insertar($_POST['nombre'], $_POST['precio']);
    header('Location: index.php');
    exit;
}

$editar = isset($_GET['editar']) ? $modelo->buscar((int) $_GET['editar']) : null;
$productos = $modelo->mostrar();
require __DIR__ . '/../vista/index.php';
