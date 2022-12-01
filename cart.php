<?php
include "conexion.php";
include "cartProcess.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Restaurant</title>

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
                <li><a href="shop.php">Ordenar</a></li>
                <li id="lg-bag"><a class="active" href="cart.php"><span class="material-symbols-outlined">shopping_bag</span></a></li>
                <span id="close" class="material-symbols-outlined">close</span>
            </ul>
        </div>

        <div id="mobile">
            <button class="action-btn">
                <span onclick="window.location.href='cart.html';" class="material-symbols-outlined">shopping_bag</span>
                <span class="count">0</span>
            </button>
            <span id="bar" class="material-symbols-outlined">menu_open</span>
        </div>
    </section>

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>¡Ahorre más con cupones y obtenga hasta un 40% de descuento!</p>
    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remover</td>
                    <td>Imagen</td>
                    <td>Producto</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <?php
            $total = 0;

            if (isset($_SESSION["shopping_cart"])) {
                $pagar= 0;
                $ISV=0;
                $total = 0;
                $contar = count($_SESSION['shopping_cart']);
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
                    <tbody>
                        <tr>
                            <td><a href="product-details.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="material-symbols-outlined">cancel</span></a></td>
                            <td><img src="img/<?php echo $values['item_image']; ?>" alt=""></td>
                            <td><?php echo $values['item_name']; ?></td>
                            <td>$<?php echo number_format($values['item_price'], 2); ?></td>
                            <td><input type="number" value="<?php echo $values['item_quantity']; ?>"></td>
                            <td>$<?php echo number_format($values['item_price'] * $values['item_quantity'], 2); ?></td>
                        </tr>
                    </tbody>
                    <?php
                    $total = $total + ($values['item_quantity'] * $values['item_price']);
                    $ISV = 0.15 * $total;
                    $pagar = $total + $ISV;
                    ?>

            <?php
                }
            }
            ?>
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Aplicar cupón</h3>
            <div>
                <input type="text" placeholder="Ingresa el cupón">
                <button class="normal">Aplicar</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Resumen</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$<?php echo number_format($total, 2); ?></td>
                </tr>
                <tr>
                    <td>Descuento Tercera Edad</td>
                    <td>
                        
                    <form action="index.php" method="post">
                        <input type="checkbox" name="descuento" value="1">
                    </form>
                    </td>
                </tr>
                <tr>
                    <td>Envío</td>
                    <td>Gratis</td>
                </tr>
                <tr>
                    <td>ISV 15%</td>
                    <td>$<?php echo number_format(($ISV), 2); ?></td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$<?php echo number_format(($pagar), 2); ?></strong></td>
                </tr>
            </table>
            <button class="normal">Pagar</button>
        </div>
    </section>

    <?php include("layouts/footer.php") ?>

    <script src="js/script.js"></script>
</body>

</html>