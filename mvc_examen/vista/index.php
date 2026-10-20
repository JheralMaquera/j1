<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen MVC</title>
</head>
<body>
    <h1>Bienvenido al Examen de Laboratorio de MVC</h1>

    <h2><?= $editar ? 'Editar producto' : 'Agregar producto' ?></h2>
    <form method="post" action="index.php">
        <input type="hidden" name="accion" value="guardar">
        <input type="hidden" name="id" value="<?= $editar['id'] ?? 0 ?>">
        Nombre: <input name="nombre" maxlength="50" required value="<?= htmlspecialchars($editar['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        Precio: <input name="precio" type="number" min="0" max="99999.99" step="0.01" required value="<?= $editar['precio'] ?? '' ?>">
        <button type="submit">Guardar</button>
        <?php if ($editar): ?><a href="index.php">Cancelar</a><?php endif; ?>
    </form>

    <h2>Productos</h2>
    <table border="1">
        <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Acciones</th></tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['id'] ?></td>
                <td><?= htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= $producto['precio'] ?></td>
                <td>
                    <a href="index.php?editar=<?= $producto['id'] ?>">Editar</a>
                    <form method="post" action="index.php">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
