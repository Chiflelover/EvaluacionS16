<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Gestión de Usuarios</title>
</head>
<body>

  <h1>Gestión de Usuarios</h1>

  <!-- Formulario para agregar un nuevo usuario -->
  <form action="index.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Correo Electrónico" required>
    <button type="submit">Agregar Usuario</button>
  </form>

  <h2>Lista de Usuarios</h2>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Acciones</th>
    </tr>

    <?php foreach ($_SESSION['usuarios'] as $usuario): ?>
    <tr>
      <td><?= htmlspecialchars($usuario['id']) ?></td>
      <td><?= htmlspecialchars($usuario['nombre']) ?></td>
      <td><?= htmlspecialchars($usuario['email']) ?></td>
      <td>
        <!-- Acciones no funcionales por ahora -->
        <a href="#">Editar</a> | 
        <a href="#">Eliminar</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>