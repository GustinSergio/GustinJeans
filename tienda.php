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

// Catálogo de productos con categorías
$productos = [
    1 => ["nombre"=>"Jean clásico azul", "precio"=>120000, "imagen"=>"img/jean1.jpg", "categoria"=>"hombre"],
    2 => ["nombre"=>"Camiseta negra básica", "precio"=>45000, "imagen"=>"img/camiseta1.jpg", "categoria"=>"hombre"],
    3 => ["nombre"=>"Chaqueta denim", "precio"=>180000, "imagen"=>"img/chaqueta1.jpg", "categoria"=>"hombre"],
    4 => ["nombre"=>"Vestido rojo elegante", "precio"=>220000, "imagen"=>"img/vestido1.jpg", "categoria"=>"mujer"],
    5 => ["nombre"=>"Blusa blanca oversize", "precio"=>95000, "imagen"=>"img/blusa1.jpg", "categoria"=>"mujer"],
    6 => ["nombre"=>"Chaqueta bomber negra", "precio"=>200000, "imagen"=>"img/chaqueta2.jpg", "categoria"=>"hombre"],
    7 => ["nombre"=>"Jean skinny gris", "precio"=>130000, "imagen"=>"img/jean3.jpg", "categoria"=>"hombre"],
    8 => ["nombre"=>"Camiseta estampada", "precio"=>60000, "imagen"=>"img/camiseta3.jpg", "categoria"=>"hombre"],
    9 => ["nombre"=>"Chaqueta de cuero", "precio"=>250000, "imagen"=>"img/chaqueta3.jpg", "categoria"=>"hombre"],
    10 => ["nombre"=>"Conjunto deportivo niños", "precio"=>80000, "imagen"=>"img/nino1.jpg", "categoria"=>"nino"],
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
                <li>
                    <?php echo $item['nombre']." - Talla ".$item['talla']." - $".number_format($item['precio'],0,',','.'); ?> COP
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <button type="submit" name="eliminar">Eliminar</button>
                    </form>
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






