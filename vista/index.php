<meta charset="UTF-8">
<h1>Bienvenido al Examen de Laboratorio de MVC</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $editar['id'] ?? 0 ?>">
    Nombre: <input name="nombre" required value="<?= htmlspecialchars($editar['nombre'] ?? '') ?>">
    Precio: <input name="precio" required value="<?= $editar['precio'] ?? '' ?>">
    <button>Guardar</button>
</form>
<table border="1">
    <tr><th>Nombre</th><th>Precio</th><th>Opciones</th></tr>
    <?php foreach ($productos as $p): ?>
    <tr><td><?= htmlspecialchars($p['nombre']) ?></td><td><?= $p['precio'] ?></td>
        <td><a href="?editar=<?= $p['id'] ?>">Editar</a>
            <form method="post"><input type="hidden" name="id" value="<?= $p['id'] ?>"><button name="borrar">Eliminar</button></form>
        </td></tr>
    <?php endforeach; ?>
</table>
