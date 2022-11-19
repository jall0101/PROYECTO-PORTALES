<?php
include "conexion.php";
include "cartProcess.php";

if (isset($_GET['id'])) {
    $res = $conex->query("SELECT * FROM tbl_products WHERE id=" . $_GET['id']) or die($conex->error);
    if (mysqli_num_rows($res) > 0) {
        $fila = mysqli_fetch_row($res);
    } else {
        header("Location: ./index.php");
    }
} else {
    header("Location: ./index.php");
}

$category = $fila[5];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="css/style.css">

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

    <section>
        <form action="" method="post" id="prodetails" class="section-p1">
            <div class="single-pro-image">
                <img src="img/<?php echo $fila[2]; ?>" width="100%" class="principal" id="mainImg" alt="">            
            </div>

            <div class="single-pro-details">
                <h6>Inicio / <?php echo $fila[1]; ?></h6>
                <h4><?php echo $fila[1]; ?></h4>
                <h2>$<?php echo number_format($fila[3], 2); ?></h2>
                <input type="number" name="quantity" value="1">
                <button type="submit" name="add_to_cart" class="normal">Add To Cart</button>
                <h4>Descripción</h4>
                <span><?php echo $fila[4]; ?></span>
            </div>

            <input type="hidden" name="hidden_image" value="<?php echo $fila[1]; ?>">
            <input type="hidden" name="hidden_name" value="<?php echo $fila[2]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $fila[3]; ?>">
        </form>
    </section>

    <section id="product1" class="section-p1">
        <h2>Comidas relacionadas</h2>
        <div class="pro-container">
            <?php
            $query = mysqli_query($conex, "SELECT * FROM tbl_products WHERE category = '$fila[5]' ");
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

    <script>
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");

        smallImg[0].onclick = function() {
            mainImg.src = smallImg[0].src;
        }

        smallImg[1].onclick = function() {
            mainImg.src = smallImg[1].src;
        }

        smallImg[2].onclick = function() {
            mainImg.src = smallImg[2].src;
        }

        smallImg[3].onclick = function() {
            mainImg.src = smallImg[3].src;
        }
    </script>

    <script src="js/script.js"></script>
</body>

</html>