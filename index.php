
<?php
session_start();
include 'includes/db.php'; // Include the database connection

// Fetch products from the database
$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <style>
    /* General Body and Layout */
/* ===== RESET ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* ===== BODY ===== */
body {
    background: #f0f2f5;
    color: #333;
}

/* ===== HEADER ===== */
header {
    background: #1f2937;
    color: #fff;
    padding: 20px 40px;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    font-size: 28px;
    letter-spacing: 1px;
}

/* NAV */
nav {
    display: flex;
    align-items: center;
    gap: 20px;
}

nav a {
    color: white;
    font-size: 15px;
    text-decoration: none;
    padding: 8px 15px;
    border-radius: 6px;
    transition: 0.3s ease;
}

nav a:hover {
    background: #374151;
}

.logout-button {
    background: #ef4444;
    padding: 8px 15px;
    border: none;
    border-radius: 6px;
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

.logout-button:hover {
    background: #dc2626;
}

/* CART */
.cart-link {
    color: white;
    display: flex;
    align-items: center;
    gap: 8px;
}

.cart-icon {
    width: 22px;
}

/* ===== MAIN ===== */
.main-container {
    padding: 40px;
    display: flex;
    justify-content: center;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 26px;
}

/* ===== PRODUCTS GRID ===== */
.product-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 25px;
    width: 90%;
    margin: 0 auto;
}

/* SINGLE PRODUCT */
.product {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    text-align: center;
    transition: 0.3s ease;
    display: flex;
    flex-wrap: wrap;
    
}


.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.12);
}

.product h3 {
    font-size: 18px;
    margin-bottom: 8px;
}

.product p {
    font-size: 14px;
    margin-bottom: 10px;
}

/* PRODUCT IMAGE */
.product-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 12px;
    
}

/* ADD TO CART BUTTON */
.add-to-cart-button {
    background: #10b981;
    color: white;
    padding: 12px 20px;
    font-size: 15px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s ease;
}

.add-to-cart-button:hover {
    background: #059669;
    transform: scale(1.05);
}

/* ===== FOOTER ===== */
footer {
    background: #1f2937;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: 40px;
    font-size: 15px;
}
h3{
    alighn-text: center;
}

</style>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Welcome to Our Store</h1>
            <nav>
                <a href="pages/login.php">Login</a>
                <a href="pages/register.php">Register</a>
                <a href="pages/cart.php" class="cart-link">
                    <img src="images/cart-icon.png" alt="Cart" class="cart-icon">
                    Cart
                </a>
                <form method="POST" style="display: inline;">
                    <button type="submit" name="logout" class="logout-button">Logout</button>
                </form>
            </nav>
        </div>
    </header>
    <div class="main-container">
        <main>
            <h2>Products</h2>
            <div class="product-list">
                <?php if (empty($products)) : ?>
    <p>No products available.</p>
<?php else : ?>
    <?php foreach ($products as $product) : ?>
        <div class="product">
            <h3><?= htmlspecialchars($product['name']); ?></h3>
            <p><br><br>Price: $<?= number_format($product['price'], 2); ?></p>
            <p><?= htmlspecialchars($product['description']); ?></p>
            <?php if (!empty($product['image'])) : ?>
                <img src="images/<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="product-image">
            <?php endif; ?>
            <form method="POST" action="pages/cart.php">
                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                <button type="submit" name="add_to_cart" class="add-to-cart-button">Add to Cart</button>
            </form>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
            </div>
        </main>
    </div>
    <footer>
        <p>&copy; <?= date('Y'); ?> Online Store. All rights reserved.</p>
    </footer>
</body>
</html>