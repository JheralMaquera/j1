<meta charset="UTF-8">
<h1>Bienvenido al Examen de Laboratorio de MVC</h1>
<h2><?= $editar ? 'Editar producto' : 'Agregar producto' ?></h2>

<form method="post">
    <input type="hidden" name="id" value="<?= $editar['id'] ?? 0 ?>">
    Nombre: <input name="nombre" maxlength="50" required value="<?= htmlspecialchars($editar['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    Precio: <input name="precio" type="number" min="0" max="99999.99" step="0.01" required value="<?= $editar['precio'] ?? '' ?>">
    <button name="accion" value="guardar">Guardar</button>
</form>
<?php if ($editar): ?><a href="index.php">Cancelar</a><?php endif; ?>

<h2>Productos</h2>
<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Acciones</th></tr>
    <?php foreach ($productos as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td><td><?= htmlspecialchars($p['nombre'], ENT_QUOTES, 'UTF-8') ?></td><td><?= $p['precio'] ?></td>
        <td><a href="?editar=<?= $p['id'] ?>">Editar</a>
            <form method="post">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <button name="accion" value="eliminar">Eliminar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
