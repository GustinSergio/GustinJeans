<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GustinJeans</title>

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="login-container">

    <form method="post" action="send.php" autocomplete="off">

        <h2>Iniciar Sesión</h2>

        <div class="input-group">

            <div class="input-container">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="input-container">
                <input type="password" name="password" placeholder="Contraseña" required>
                <i class="fa-solid fa-lock"></i>
            </div>

            <!-- BOTÓN LOGIN -->
            <input type="submit" name="login" class="btn" value="Iniciar sesión">

            <!-- BOTÓN REGISTRARSE -->
            <a href="registrarse.php" class="btn secondary">Crear cuenta</a>

            <!-- ENLACE OLVIDÉ CONTRASEÑA -->
            <a href="forgot_password.php" class="forgot-link">¿Olvidaste tu contraseña?</a>

        </div>

    </form>

    <?php if(isset($_GET['error'])): ?>
        <div class="error-message">
            <?php
            if($_GET['error'] == 'correo'){
                echo "El correo no existe.";
            } elseif($_GET['error'] == 'contraseña'){
                echo "La contraseña es incorrecta.";
            } elseif($_GET['error'] == 'campos'){
                echo "Debes llenar todos los campos.";
            }
            ?>
        </div>
    <?php endif; ?>

</div>

<!-- FOOTER UNIFICADO EN COLUMNAS -->
<footer style="background-color:#000; color:#fff; padding:40px 0; font-size:14px;">
  <div class="footer-container">

    <!-- Enlaces legales -->
    <div class="footer-column">
      <h3>Legal</h3>
      <p><a href="privacidad.php" style="color:#fff;">Política de Privacidad</a></p>
      <p><a href="cookies.php" style="color:#fff;">Política de Cookies</a></p>
      <p><a href="terminos.php" style="color:#fff;">Términos y Condiciones</a></p>
      <p><a href="copyright.php" style="color:#fff;">Aviso de Copyright</a></p>
      <p><a href="colombia.php" style="color:#fff;">Colombia</a></p>
    </div>

    <!-- Información Legal -->
    <div class="footer-column">
      <h3>Información Legal</h3>
      <p>©2009-2026 GustinJeans</p>
      <p>BODEGA DE MODA S.A.S<br>
      NIT: 900.047.444-4<br>
      Dirección: Crr 52D #79-07 Itagüí<br>
      Correo: acadavid@bodegademoda.com<br>
      Desarrollado por Intuix</p>
    </div>

    <!-- Contacto -->
    <div class="footer-column">
      <h3>Contacto</h3>
      <p>Carrera 42c #5b-5, Bogotá</p>
      <p>Email: s.gustinunicall@gmail.com</p>
      <p>NIT: 123.456.789-0</p>
      <p>WhatsApp: (57) 312 544 6302</p>
      <p>WhatsApp: (57) 311 579 3460</p>
    </div>

    <!-- Atención al Cliente -->
    <div class="footer-column">
      <h3>Atención al Cliente</h3>
      <p>Tel: (57) 320 465 1039</p>
      <p>Cambios, garantías y devoluciones</p>
      <p><a href="pqr.php" style="color:#fff;">Consulta tu PQR</a></p>
    </div>

    <!-- Medios de Pago -->
    <div class="footer-column">
      <h3>Medios de Pago</h3>
      <p><i class="fa-solid fa-lock"></i> Pago Seguro</p>
      <p><i class="fa-solid fa-credit-card"></i> Mercadopago</p>
      <p><i class="fa-solid fa-mobile"></i> Nequi / Daviplata</p>
      <p><i class="fa-solid fa-building-columns"></i> Bancolombia / Av Villas / BBVA</p>
      <p><i class="fa-solid fa-money-bill"></i> Efecty</p>
    </div>

    <!-- Redes Sociales -->
    <div class="footer-column">
      <h3>Síguenos</h3>
      <a href="https://www.facebook.com/GustinJeans" target="_blank" style="color:#fff; margin:0 10px;">
        <i class="fa-brands fa-facebook fa-2x"></i>
      </a>
      <a href="https://www.instagram.com/GustinJeans" target="_blank" style="color:#fff; margin:0 10px;">
        <i class="fa-brands fa-instagram fa-2x"></i>
      </a>
      <a href="https://www.tiktok.com/@GustinJeans" target="_blank" style="color:#fff; margin:0 10px;">
        <i class="fa-brands fa-tiktok fa-2x"></i>
      </a>
    </div>

  </div>
</footer>

<style>
  .footer-container {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 40px;
    text-align: left;
    padding: 0 60px;          /* aire uniforme en ambos lados */
    box-sizing: border-box;
    justify-items: stretch;   /* cada columna ocupa su espacio */
  }

  .footer-column {
    padding: 0 10px;          /* aire interno uniforme */
  }

  /* Responsive */
  @media (max-width: 992px) {
    .footer-container {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media (max-width: 600px) {
    .footer-container {
      grid-template-columns: 1fr;
    }
  }
</style>







</body>
</html>





