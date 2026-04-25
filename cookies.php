<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Política de Cookies - GustinJeans</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    h1 {
      text-align: center;
    }
    /* Estilos del modal */
    .modal {
      display: none; /* Oculto por defecto */
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.5);
    }
    .modal-content {
      background-color: #fff;
      margin: 10% auto;
      padding: 20px;
      border-radius: 8px;
      width: 80%;
      max-width: 500px;
      text-align: center;
    }
    .modal-content h2 {
      margin-top: 0;
    }
    .btn {
      padding: 10px 20px;
      margin: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn.accept {
      background-color: #4CAF50;
      color: white;
    }
    .btn.reject {
      background-color: #f44336;
      color: white;
    }
  </style>
</head>
<body>

  <h1>Política de Cookies</h1>
  <p>Este sitio utiliza cookies para recordar tus preferencias y mejorar la navegación. Puedes gestionar las cookies desde la configuración de tu navegador.</p>

  <!-- Modal -->
  <div id="cookieModal" class="modal">
    <div class="modal-content">
      <h2>Uso de Cookies</h2>
      <p>Este sitio utiliza cookies para mejorar tu experiencia. ¿Aceptas el uso de cookies?</p>
      <button class="btn accept" onclick="acceptCookies()">Aceptar</button>
      <button class="btn reject" onclick="rejectCookies()">Rechazar</button>
    </div>
  </div>

  <script>
    // Mostrar el modal al cargar la página
    window.onload = function() {
      document.getElementById("cookieModal").style.display = "block";
    }

    function acceptCookies() {
      alert("Has aceptado el uso de cookies.");
      document.getElementById("cookieModal").style.display = "none";
      // Aquí podrías guardar la preferencia en localStorage o en la base de datos
    }

    function rejectCookies() {
      alert("Has rechazado el uso de cookies.");
      document.getElementById("cookieModal").style.display = "none";
      // Aquí podrías desactivar funciones que dependan de cookies
    }
  </script>

</body>
</html>

