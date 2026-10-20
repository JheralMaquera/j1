<?php
require_once __DIR__ . '/../modelo/Modelo.php';

$modelo = new Modelo();

if (isset($_POST['accion'])) {
    $id = (int) $_POST['id'];

    if ($_POST['accion'] == 'guardar') {
        if ($id == 0) {
            $modelo->insertar($_POST['nombre'], $_POST['precio']);
        } else {
            $modelo->actualizar($id, $_POST['nombre'], $_POST['precio']);
        }
    } elseif ($_POST['accion'] == 'eliminar') {
        $modelo->eliminar($id);
    }

    header('Location: index.php');
    exit;
}

$editar = isset($_GET['editar']) ? $modelo->buscar((int) $_GET['editar']) : null;
$productos = $modelo->mostrar();
require __DIR__ . '/../vista/index.php';
