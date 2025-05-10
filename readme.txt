# 🍓 E-commerce Fruit Shop (PHP + MySQL)

A simple e-commerce web application for selling fruits online, built using **PHP** and **MySQL**. It includes essential features such as product listing, shopping cart, checkout process, and an admin dashboard for product and order management.

---

## 🚀 Features

### 👤 User Side
- Browse fruit products with images, prices, and descriptions
- Add to cart and update quantity
- View cart and proceed to checkout
- User registration & login
- Order history

### 🔐 Admin Side
- Admin login panel
- Add, edit, delete fruit products
- Manage categories
- View and manage customer orders

---

## 🛠️ Technologies Used

- **Backend**: PHP (Vanilla PHP)
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Database Management**: phpMyAdmin

---

## 📁 Project Structure

```
/PHP-ecommerce-fruit-shop
│
├── /admin                # Admin dashboard
├── /assets               # CSS, JS, Images
├── /includes             # Header, footer, DB connection
├── /json                 # JSON data files
├── addtocart.php         # Add to cart functionality
├── all_product.php       # Display all products
├── catagory.php          # Category management
├── ecommerce.sql         # Database schema
├── exist_order.php       # Existing order handling
├── index.php             # Home page
├── readme.txt            # Project documentation
├── search_product.php    # Product search functionality
├── single_product.php    # Single product details
├── user_login.php        # User login
├── user_password_recover.php # Password recovery
├── user_password_update.php  # Password update
├── user_register.php     # User registration
├── userprofile.php       # User profile management
└── userprofile copy.php  # Backup of user profile
```

---

## 📦 Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Quytaki/PHP-ecommerce-fruit-shop.git
   ```

2. **Import the MySQL database**:
   - Open `phpMyAdmin` or MySQL CLI
   - Create a new database, e.g., `ecommerce`
   - Import the SQL file `ecommerce.sql` located in the root directory

3. **Configure database connection**:
   - Open the relevant PHP files (e.g., `includes/db.php`) and update the database credentials:
     ```php
     $host = 'localhost';
     $user = 'root';
     $pass = '';
     $dbname = 'ecommerce';
     ```

4. **Run the app**:
   - Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP)
   - Start Apache and MySQL services
   - Visit `http://localhost/PHP-ecommerce-fruit-shop` in your browser

---

## ✅ Sample Admin Login

```
Username: tuan1060369@gmail.com
Password: 1234
```

---

## 📌 To Do / Improvements

- Integrate payment gateway (e.g., PayPal, VNPay)
- Enhance UI/UX with modern frameworks like Bootstrap or Tailwind CSS
- Implement email notifications for order confirmations
- Add product search and filtering capabilities

---

## 📄 License

This project is open-source and free to use under the [MIT License](LICENSE).
