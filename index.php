<?php
include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rebirth</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="overlay" data-overlay></div>

    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Inicio</a></li>
                <li><a href="shop.php">Ordenar</a></li>
                <li id="lg-bag"><a href="cart.php"><span class="material-symbols-outlined">shopping_bag</span></a></li>
                <span id="close" class="material-symbols-outlined">close</span>
            </ul>
        </div>

        <div id="mobile">
            <button class="action-btn">
                <span class="material-symbols-outlined">shopping_bag</span>
                <span class="count">0</span>
            </button>
            <span id="bar" class="material-symbols-outlined">menu_open</span>
        </div>
    </section>

    <section id="hero">
        <h4>Mejores-ofertas</h4>
        <h2 class="bannerr">Súper ofertas</h2>
        <h1>En todas las ordenes</h1>
        <p>¡Ahorre más con cupones y hasta un 70 % de descuento!</p>
        <button onclick="window.location.href='shop.php';">Ordenar ahora</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Envío gratis</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Ordenar en línea</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Ahorra dinero</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promociones</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Felicidad</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>Atención 24/7</h6>
        </div>
    </section>


    <section id="product1" class="section-p1">
        <h2>Nuestros productos</h2>
        <p>¡Tienes que probarlos todos!</p>
        <div class="pro-container">
            <?php
            $query = mysqli_query($conex, "SELECT * FROM tbl_products ");
            $count = mysqli_num_rows($query);
            if ($count > 0) {
                while ($row = mysqli_fetch_array($query)) {
            ?>
                    <div class="pro" onclick="window.location.href='product-details.php?id=<?php echo $row["id"] ?>';">
                        <img src="img/<?php echo $row["image"] ?>" alt="">
                        <div class="des">
                            <h5><?php echo $row["name"] ?></h5>
                            <div class="star">
                                <span class="material-symbols-outlined">star</span>
                                <span class="material-symbols-outlined">star</span>
                                <span class="material-symbols-outlined">star</span>
                                <span class="material-symbols-outlined">star</span>
                                <span class="material-symbols-outlined">star</span>
                            </div>
                            <h4>$<?php echo number_format($row["price"], 2); ?></h4>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>CARA</h4>
        <h2>Obtenga un <span>70% de descuento</span> - en todos nuestros platillos</h2>
        <button class="normal" onclick="window.location.href='shop.php';">Ordenar</button>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Suscribete para recibir noticias</h4>
            <p>Recibe en tu E-mail notificaciones sobre nuestros últimos productos y <span>ofertas especiales</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Correo electrónico">
            <button class="normal">Suscribirse</button>
        </div>
    </section>

    <?php include("layouts/footer.php") ?>

    <script src="js/script.js"></script>
</body>

</html>