<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = [];
}
if(!isset($_SESSION['wishlist'])){
    $_SESSION['wishlist'] = [];
}

// Catálogo de productos con categorías (solo prendas inferiores)
$productos = [
    // --- HOMBRE ---
    1 => ["nombre"=>"Jean clásico azul", "precio"=>59900, "imagen"=>"img/Jean clásico azul.jpg", "categoria"=>"hombre"],
    2 => ["nombre"=>"Jean skinny negro", "precio"=>69900, "imagen"=>"img/Jean skinny negro.jpg", "categoria"=>"hombre"],
    3 => ["nombre"=>"Jean recto gris", "precio"=>74900, "imagen"=>"img/Jean recto gris.jpg", "categoria"=>"hombre"],
    4 => ["nombre"=>"Jean desgastado azul", "precio"=>72900, "imagen"=>"img/Jean desgastado azul.jpg", "categoria"=>"hombre"],
    5 => ["nombre"=>"Jean cargo", "precio"=>73900, "imagen"=>"img/Jean cargo.jpg", "categoria"=>"hombre"],
    6 => ["nombre"=>"Jean slim fit", "precio"=>69900, "imagen"=>"img/Jean slim fit.jpg", "categoria"=>"hombre"],
    7 => ["nombre"=>"Pantalón cargo verde", "precio"=>69900, "imagen"=>"img/Pantalón cargo verde.jpg", "categoria"=>"hombre"],
    8 => ["nombre"=>"Pantalón recto beige", "precio"=>74900, "imagen"=>"img/Pantalón recto beige.jpg", "categoria"=>"hombre"],
    9 => ["nombre"=>"Pantalón jogger gris", "precio"=>69900, "imagen"=>"img/Pantalón jogger gris.jpg", "categoria"=>"hombre"],
    10 => ["nombre"=>"Short denim azul", "precio"=>39900, "imagen"=>"img/Short denim azul.jpg", "categoria"=>"hombre"],

    // --- MUJER ---
    11 => ["nombre"=>"Jean bota ancha", "precio"=>69900, "imagen"=>"img/Jean bota ancha.jpg", "categoria"=>"mujer"],
    12 => ["nombre"=>"Jean mom fit", "precio"=>74900, "imagen"=>"img/Jean mom fit.jpg", "categoria"=>"mujer"],
    13 => ["nombre"=>"Jean rasgado rodillas", "precio"=>74900, "imagen"=>"img/Jean rasgado rodillas.jpg", "categoria"=>"mujer"],
    14 => ["nombre"=>"Jean boyfriend", "precio"=>73900, "imagen"=>"img/Jean boyfriend.jpg", "categoria"=>"mujer"],
    15 => ["nombre"=>"Pantalón palazzo", "precio"=>74900, "imagen"=>"img/Pantalón palazzo.jpg", "categoria"=>"mujer"],
    16 => ["nombre"=>"Pantalón culotte", "precio"=>73900, "imagen"=>"img/Pantalón culotte.jpg", "categoria"=>"mujer"],
    17 => ["nombre"=>"Pantalón flare", "precio"=>74900, "imagen"=>"img/Pantalón flare.jpg", "categoria"=>"mujer"],
    18 => ["nombre"=>"Falda denim azul", "precio"=>49900, "imagen"=>"img/Falda denim azul.jpg", "categoria"=>"mujer"],
    19 => ["nombre"=>"Falda corta negra", "precio"=>45900, "imagen"=>"img/Falda corta negra.jpg", "categoria"=>"mujer"],
    20 => ["nombre"=>"Falda midi gris", "precio"=>47900, "imagen"=>"img/Falda midi gris.jpg", "categoria"=>"mujer"],
    21 => ["nombre"=>"Falda plisada blanca", "precio"=>49900, "imagen"=>"img/Falda plisada blanca.jpg", "categoria"=>"mujer"],
    22 => ["nombre"=>"Falda lápiz", "precio"=>52900, "imagen"=>"img/Falda lápiz.jpg", "categoria"=>"mujer"],
    23 => ["nombre"=>"Falda cargo", "precio"=>54900, "imagen"=>"img/Falda cargo.jpg", "categoria"=>"mujer"],
    24 => ["nombre"=>"Short blanco", "precio"=>42900, "imagen"=>"img/Short blanco.jpg", "categoria"=>"mujer"],
    25 => ["nombre"=>"Short rasgado", "precio"=>43900, "imagen"=>"img/Short rasgado.jpg", "categoria"=>"mujer"],
    26 => ["nombre"=>"Short beige", "precio"=>42900, "imagen"=>"img/Short beige.jpg", "categoria"=>"mujer"],
    27 => ["nombre"=>"Short denim negro", "precio"=>44900, "imagen"=>"img/Short denim negro.jpg", "categoria"=>"mujer"],
    28 => ["nombre"=>"Short azul claro", "precio"=>42900, "imagen"=>"img/Short azul claro.jpg", "categoria"=>"mujer"],

    // --- NIÑO ---
    29 => ["nombre"=>"Jean clásico niños azul", "precio"=>49900, "imagen"=>"img/Jean clásico niños azul.jpg", "categoria"=>"nino"],
    30 => ["nombre"=>"Jean skinny niños negro", "precio"=>52900, "imagen"=>"img/Jean skinny niños negro.jpg", "categoria"=>"nino"],
    31 => ["nombre"=>"Jean recto niños gris", "precio"=>53900, "imagen"=>"img/Jean recto niños gris.jpg", "categoria"=>"nino"],
    32 => ["nombre"=>"Short denim niños azul", "precio"=>39900, "imagen"=>"img/Short denim niños azul.jpg", "categoria"=>"nino"],
    33 => ["nombre"=>"Short cargo niños beige", "precio"=>42900, "imagen"=>"img/Short cargo niños beige.jpg", "categoria"=>"nino"],
    34 => ["nombre"=>"Leggings deportivos niños", "precio"=>45900, "imagen"=>"img/Leggings deportivos niños.jpg", "categoria"=>"nino"],
    35 => ["nombre"=>"Leggings básicos niños negros", "precio"=>44900, "imagen"=>"img/Leggings básicos niños negros.jpg", "categoria"=>"nino"],
    36 => ["nombre"=>"Falda denim niñas azul", "precio"=>47900, "imagen"=>"img/Falda denim niñas azul.jpg", "categoria"=>"nino"],
    37 => ["nombre"=>"Short niños gris", "precio"=>43900, "imagen"=>"img/Short niños gris.jpg", "categoria"=>"nino"],
    38 => ["nombre"=>"Jean niños azul claro", "precio"=>52900, "imagen"=>"img/Jean niños azul claro.jpg", "categoria"=>"nino"],
    39 => ["nombre"=>"Leggings niñas rosa", "precio"=>45900, "imagen"=>"img/Leggings niñas rosa.jpg", "categoria"=>"nino"],
    40 => ["nombre"=>"Falda niñas negra", "precio"=>46900, "imagen"=>"img/Falda niñas negra.jpg", "categoria"=>"nino"],
];


$busqueda = "";
if(isset($_GET['buscar'])){
    $busqueda = strtolower(trim($_GET['buscar']));
}

$categoria = isset($_GET['categoria']) ? strtolower($_GET['categoria']) : "";

if(isset($_POST['agregar'])){
    $id = $_POST['id'];
    $talla = $_POST['talla'];
    if(isset($productos[$id])){
        $item = $productos[$id];
        $item['talla'] = $talla;
        $_SESSION['carrito'][] = $item;
    }
}

if(isset($_POST['eliminar'])){
    $index = $_POST['index'];
    if(isset($_SESSION['carrito'][$index])){
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }
}

if(isset($_POST['wishlist'])){
    $id = $_POST['id'];
    if(isset($productos[$id])){
        $_SESSION['wishlist'][] = $productos[$id];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gustin Jeans</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Inter:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="tienda.css">
    <script>
        function toggleCart(){
            var cart = document.getElementById("cartDropdown");
            cart.style.display = (cart.style.display === "block") ? "none" : "block";
        }
        function toggleWishlist(){
            var wish = document.getElementById("wishlistDropdown");
            wish.style.display = (wish.style.display === "block") ? "none" : "block";
        }
    </script>
</head>
<body>

<header class="nav">
    <div class="logo">GUSTIN JEANS</div>
    <div class="menu">
        <form method="get" class="search-bar">
            <input type="text" name="buscar" placeholder="Buscar producto..." value="<?php echo htmlspecialchars($busqueda); ?>">
            <button type="submit">Buscar</button>
        </form>
        <span onclick="toggleCart()" style="cursor:pointer;">🛒 Cesta <?php echo count($_SESSION['carrito']); ?></span>
        <span onclick="toggleWishlist()" style="cursor:pointer;">❤️ Favoritos <?php echo count($_SESSION['wishlist']); ?></span>
        <span><?php echo $_SESSION['user']; ?></span>
        <a href="logout.php" class="logout-btn">Cerrar sesión</a>
    </div>
</header>

<nav class="categories">
    <a href="?categoria=hombre">👕 HOMBRE</a>
    <a href="?categoria=mujer">👗 MUJER</a>
    <a href="?categoria=nino">👶 NIÑO</a>
</nav>

<section class="grid">
    <?php foreach($productos as $id => $p){ 
        if($busqueda && strpos(strtolower($p['nombre']), $busqueda) === false) continue;
        if($categoria && strtolower($p['categoria']) !== $categoria) continue;
    ?>
        <div class="product">
            <div class="img-container">
                <img src="<?php echo $p['imagen']; ?>">
            </div>
            <div class="info">
                <p class="name"><?php echo $p['nombre']; ?></p>
                <p class="price">$<?php echo number_format($p['precio'], 0, ',', '.'); ?> COP</p>
                <form method="post" class="actions">
                    <select name="talla" required>
                        <option value="">Talla</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="agregar">Agregar 🛒</button>
                    <button type="submit" name="wishlist">❤️</button>
                </form>
            </div>
        </div>
    <?php } ?>
</section>

<div id="cartDropdown" class="cart-dropdown">
    <h3>Tu Canasta</h3>
    <?php if(!empty($_SESSION['carrito'])){ ?>
        <ul>
            <?php 
            $total = 0;
            foreach($_SESSION['carrito'] as $index => $item){ 
                $total += $item['precio'];
            ?>
               <li style="display:flex; align-items:center; margin-bottom:10px;">
    <!-- Miniatura del producto -->
    <img src="<?php echo $item['imagen']; ?>" alt="<?php echo $item['nombre']; ?>" 
         style="width:50px; height:auto; margin-right:10px; border-radius:5px;">
    
    <!-- Info del producto -->
    <div>
        <?php echo $item['nombre']." - Talla ".$item['talla']." - $".number_format($item['precio'],0,',','.'); ?> COP
        <form method="post" style="display:inline;">
            <input type="hidden" name="index" value="<?php echo $index; ?>">
            <button type="submit" name="eliminar">Eliminar</button>
        </form>
    </div>
</li>

            <?php } ?>
        </ul>
        <p><strong>Total: $<?php echo number_format($total,0,',','.'); ?> COP</strong></p>
    <?php } else { ?>
        <p>No tienes productos en la canasta.</p>
    <?php } ?>
</div>

<div id="wishlistDropdown" class="cart-dropdown">
    <h3>Favoritos</h3>
    <?php if(!empty($_SESSION['wishlist'])){ ?>
        <ul>
            <?php foreach($_SESSION['wishlist'] as $item){ ?>
                <li><?php echo $item['nombre']." - $".number_format($item['precio'],0,',','.'); ?> COP</li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>No tienes productos en favoritos.</p>
    <?php } ?>
</div>

</body>
</html>






