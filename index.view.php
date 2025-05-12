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
  <?php if (!empty($_SESSION['usuarios'])); ?>
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
      <a href="editar.php?id=<?= $usuario['id'] ?>" class="btn-editar">Editar</a>
      <a href="index.php?eliminar=<?= $usuario['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  
    <h1>Editar Usuario</h1>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="error"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    
    <form method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
        
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
        
        <button type="submit">Guardar Cambios</button>
        <a href="index.php" class="btn-cancelar">Cancelar</a>
    </form>


</body>
</html>