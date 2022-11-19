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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/order.css">

</head>

<body>

    <div class="overlay" data-overlay></div>

    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Inicio</a></li>
                <li><a class="active" href="shop.php">Ordenar</a></li>
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

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>¡Ahorre más con cupones y obtenga hasta un 70% de descuento!</p>
    </section>

    <section id="product1" class="section-p1">
        <div class="container">
            <div class="food-buttons">
                <button class="b-menu is-active">Menú full</button>
                <button class="b-menu">Comida China</button>
                <button class="b-menu">Comida Italiana</button>
                <button class="b-menu">Comida CentroAmericana</button>
            </div>

            <div class="subcontainer">
                <div class="f-menu is-active">
                    <div class="product">
                        <?php
                        $query = mysqli_query($conex, "SELECT * FROM tbl_products");
                        $count = mysqli_num_rows($query);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <div onclick="window.location.href='product-details.php?id=<?php echo $row["id"] ?>';" class="product-show">
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <img src="img<?php echo $row["image"] ?>" alt="" class="showcase-img">
                                        </div>
                                        <div class="product-content">
                                            <p class="product-title">
                                                <?php echo $row["name"] ?>
                                            </p>
                                            <div class="price-box">
                                                <p class="price">
                                                    $<?php echo number_format($row["price"], 2); ?>
                                                </p>
                                            </div>
                                            <p class="product-description">
                                                <?php echo $row["description"] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                /*PRODUCTOS PARA LA VENTA POR SECCIONES*/
                <div class="f-menu">
                    <div class="product">
                        <?php
                        #COMIDA CHINA CON CLAVE DE CATEGORIA 'ch'
                        $query = mysqli_query($conex, "SELECT * FROM tbl_products WHERE category = 'ch' ");
                        $count = mysqli_num_rows($query);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <div onclick="window.location.href='product-details.php?id=<?php echo $row["id"] ?>';" class="product-show">
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <img src="img/<?php echo $row["image"] ?>" alt="" class="showcase-img">
                                        </div>
                                        <div class="product-content">
                                            <p class="product-title">
                                                <?php echo $row["name"] ?>
                                            </p>
                                            <div class="price-box">
                                                <p class="price">
                                                    $<?php echo number_format($row["price"], 2); ?>
                                                </p>
                                            </div>
                                            <p class="product-description">
                                                <?php echo $row["description"] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="f-menu">
                    <div class="product">
                        <?php
                        #COMIDA ITALIANA CON CLAVE DE CATEGORIA 'ita'
                        $query = mysqli_query($conex, "SELECT * FROM tbl_products WHERE category = 'ita' ");
                        $count = mysqli_num_rows($query);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <div onclick="window.location.href='product-details.php?id=<?php echo $row["id"] ?>';" class="product-show">
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <img src="img/<?php echo $row["image"] ?>" alt="" class="showcase-img">
                                        </div>
                                        <div class="product-content">
                                            <p class="product-title">
                                                <?php echo $row["name"] ?>
                                            </p>
                                            <div class="price-box">
                                                <p class="price">
                                                    $<?php echo number_format($row["price"], 2); ?>
                                                </p>
                                            </div>
                                            <p class="product-description">
                                                <?php echo $row["description"] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="f-menu">
                    <div class="product">
                        <?php
                        #COMIDA CENTRO-AMERICANA CON CLAVE DE CATEGORIA 'ca'
                        $query = mysqli_query($conex, "SELECT * FROM tbl_products WHERE category = 'ca' ");
                        $count = mysqli_num_rows($query);
                        if ($count > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <div onclick="window.location.href='product-details.php?id=<?php echo $row["id"] ?>';" class="product-show">
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <img src="img/<?php echo $row["image"] ?>" alt="" class="showcase-img">
                                        </div>
                                        <div class="product-content">
                                            <p class="product-title">
                                                <?php echo $row["name"] ?>
                                            </p>
                                            <div class="price-box">
                                                <p class="price">
                                                    $<?php echo number_format($row["price"], 2); ?>
                                                </p>
                                            </div>
                                            <p class="product-description">
                                                <?php echo $row["description"] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
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