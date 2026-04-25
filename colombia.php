<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Colombia - GustinJeans</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      line-height: 1.6;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .city-list {
      list-style: none;
      padding: 0;
    }
    .city-list li {
      margin: 8px 0;
    }
    .city-list a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      cursor: pointer;
    }
    .city-info {
      display: none;
      margin-top: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      background: #f9f9f9;
    }
  </style>
</head>
<body>
  <h1>Ciudades de Colombia</h1>
  <p>Haz clic en una ciudad para ver más información:</p>

  <ul class="city-list">
    <li><a onclick="showInfo('bogota')">Bogotá</a></li>
    <li><a onclick="showInfo('medellin')">Medellín</a></li>
    <li><a onclick="showInfo('cali')">Cali</a></li>
    <li><a onclick="showInfo('cartagena')">Cartagena</a></li>
    <li><a onclick="showInfo('barranquilla')">Barranquilla</a></li>
  </ul>

  <!-- Info de cada ciudad -->
  <div id="bogota" class="city-info">
    <h3>Bogotá</h3>
    <p>Capital de Colombia, ubicada en la región andina. Conocida por su cultura, museos y el cerro de Monserrate.</p>
  </div>

  <div id="medellin" class="city-info">
    <h3>Medellín</h3>
    <p>La ciudad de la eterna primavera, famosa por su clima agradable, innovación y el Metro.</p>
  </div>

  <div id="cali" class="city-info">
    <h3>Cali</h3>
    <p>Capital de la salsa, reconocida por su música, baile y ambiente festivo.</p>
  </div>

  <div id="cartagena" class="city-info">
    <h3>Cartagena</h3>
    <p>Ciudad costera con murallas coloniales, playas y gran atractivo turístico.</p>
  </div>

  <div id="barranquilla" class="city-info">
    <h3>Barranquilla</h3>
    <p>Ciudad portuaria famosa por su Carnaval, declarado Patrimonio Cultural.</p>
  </div>

  <script>
    function showInfo(cityId) {
      // Ocultar todas las secciones
      var infos = document.querySelectorAll('.city-info');
      infos.forEach(function(info) {
        info.style.display = 'none';
      });
      // Mostrar solo la seleccionada
      document.getElementById(cityId).style.display = 'block';
    }
  </script>
</body>
</html>

