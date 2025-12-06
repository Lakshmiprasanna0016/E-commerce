**E-Commerce Website – PHP & MySQL**

This project is a simple yet fully functional e-commerce platform built using PHP, MySQL, HTML, and CSS. It includes separate modules for Users and Admins, offering smooth shopping features for customers and powerful management features for administrators.


**User Module:**

The user section allows customers to register, log in, browse products, and manage their shopping cart.
Users can create an account by providing basic details such as name, email, and password. After logging in, customers can view all available products on the homepage, including their names, prices, descriptions, and images.
The platform enables users to add products to their cart, update quantities, and remove items as needed. All cart operations are handled through the cart.php page, which also displays the total amount for checkout.


**Admin Module:**

The admin section provides complete control over the product inventory.
Admins can securely log in using their credentials and access the dashboard, where they can add, edit, and delete products.
The add_product.php page allows admins to upload product images and enter product details, which are then displayed on the main website.
Through the management panel, admins can easily update product information or remove items from the store.


**Database Structure:**

The system uses three main tables:
**users** – stores usernames, emails, hashed passwords, and role (user/admin).
**products** – stores product details including name, price, description, and image filename.
**cart** – maintains user-specific cart items with product references and quantities.


**Website Flow:**

When a user registers, their data is validated and stored securely with hashed passwords.
Logging in starts a session for personalized browsing.
Adding a product to the cart inserts the item into the cart table linked to the user’s ID.
When admins add or edit products, changes instantly reflect on the homepage.
Deleting a product removes it from the database and the user interface.
