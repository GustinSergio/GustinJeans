<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Selecciona tu ciudad - GustinJeans</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      line-height: 1.6;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      text-align: center;
      margin-top: 20px;
    }
    select {
      padding: 8px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      margin-top: 15px;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      background: #333;
      color: #fff;
      cursor: pointer;
    }
    button:hover {
      background: #555;
    }
  </style>
</head>
<body>
  <h1>Selecciona tu ciudad</h1>
  <p>Por favor elige la ciudad donde te encuentras:</p>

  <form method="post" action="procesar_ciudad.php">
    <div class="form-group">
      <select name="ciudad" required>
        <option value="">-- Selecciona una ciudad --</option>
        <option value="bogota">Bogotá</option>
        <option value="medellin">Medellín</option>
        <option value="cali">Cali</option>
        <option value="cartagena">Cartagena</option>
        <option value="barranquilla">Barranquilla</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit">Confirmar</button>
    </div>
  </form>
</body>
</html>

