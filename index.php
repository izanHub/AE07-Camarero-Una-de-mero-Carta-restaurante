<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú del Restaurante</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <header class="hero">
    <h1>Bienvenido a Nuestro Restaurante</h1>
    <p>Descubre nuestra deliciosa carta</p>
  </header>

  <main class="menu-section">
    <h2>Nuestra Carta</h2>

    <?php
    $xml = simplexml_load_file("./xml/menu.xml") or die("Error al cargar el archivo XML");

    // Categorías
    $categorias = [
        "entrante" => "Entrantes",
        "principal" => "Platos Principales",
        "postre" => "Postres",
        "bebida" => "Bebidas" // Cambiado de "bebidas" a "bebida"
    ];

    foreach ($categorias as $tipo => $titulo) {
      echo "<section class='categoria'>";
      echo "<h3>$titulo</h3>";
      echo "<div class='menu-grid'>";

      foreach ($xml->plato as $plato) {
        if ($plato["tipo"] == $tipo) {
          $nombre = $plato->nombre;
          $descripcion = $plato->descripcion;
          $calorias = $plato->descripcion["calorias"];
          $precio = $plato->precio;

          echo "<div class='plato-card'>";
          echo "<h4>$nombre</h4>";
          echo "<p class='descripcion'>$descripcion</p>";
          echo "<p class='calorias'>Calorías: $calorias kcal</p>";
          echo "<p class='precio'>Precio: &euro;$precio</p>";
          echo "</div>";
        }
      }

      echo "</div>";
      echo "</section>";
    }
    ?>
  </main>
</body>
</html>
