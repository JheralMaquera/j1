<?php
class Modelo
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=examen_mvc;charset=utf8mb4', 'root', '');
    }

    public function insertar($nombre, $precio)
    {
        $this->db->prepare('INSERT INTO productos (nombre, precio) VALUES (?, ?)')->execute([$nombre, $precio]);
    }

    public function mostrar()
    {
        return $this->db->query('SELECT * FROM productos')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id)
    {
        $sql = $this->db->prepare('SELECT * FROM productos WHERE id = ?');
        $sql->execute([$id]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $precio)
    {
        $this->db->prepare('UPDATE productos SET nombre = ?, precio = ? WHERE id = ?')->execute([$nombre, $precio, $id]);
    }

    public function eliminar($id)
    {
        $this->db->prepare('DELETE FROM productos WHERE id = ?')->execute([$id]);
    }
}
