<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2, h3 {
            color: #333;
        }
        pre {
            background: #eee;
            padding: 10px;
            border-radius: 5px;
        }
        img {
            max-width: 100%;
        }
        .code-block {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gaming Gear E-commerce Website</h1>
        <p>Welcome to the Gaming Gear E-commerce Website! This platform allows users to buy gaming gear, add items to their wishlist, and manage their profiles. Admin users have additional functionalities to add or delete products.</p>

        <h2>Table of Contents</h2>
        <ul>
            <li><a href="#features">Features</a></li>
            <li><a href="#screenshots">Screenshots</a></li>
            <li><a href="#installation">Installation</a></li>
            <li><a href="#usage">Usage</a></li>
            <li><a href="#contributing">Contributing</a></li>
            <li><a href="#license">License</a></li>
        </ul>

        <h2 id="features">Features</h2>
        <ul>
            <li><strong>User Authentication:</strong> Sign up and log in as a user (buyer) or admin.</li>
            <li><strong>Product Management:</strong> Admins can add, update, and delete products.</li>
            <li><strong>Wishlist:</strong> Users can add items to their wishlist for future reference.</li>
            <li><strong>Role-based Access:</strong> Different functionalities available for buyers and admins.</li>
            <li><strong>Responsive Design:</strong> Compatible with various devices.</li>
        </ul>

        <h2 id="screenshots">Screenshots</h2>
        <h3>Homepage</h3>
        <img src="path/to/homepage-screenshot.png" alt="Homepage">
        
        <h3>Product Page</h3>
        <img src="path/to/product-page-screenshot.png" alt="Product Page">
        
        <h3>Wishlist</h3>
        <img src="path/to/wishlist-screenshot.png" alt="Wishlist">
        
        <h3>Admin Dashboard</h3>
        <img src="path/to/admin-dashboard-screenshot.png" alt="Admin Dashboard">

        <h2 id="installation">Installation</h2>
        <pre><code class="code-block">
git clone https://github.com/yourusername/gaming-gear-website.git
cd gaming-gear-website
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
npm run dev
        </code></pre>

        <h2 id="usage">Usage</h2>
        <p><strong>User:</strong> Sign up or log in to browse products and manage your wishlist.</p>
        <p><strong>Admin:</strong> Log in with admin credentials to manage products and access the admin dashboard.</p>

        <h2 id="contributing">Contributing</h2>
        <p>Contributions are welcome! Please fork the repository and submit a pull request.</p>

        <h2 id="license">License</h2>
        <p>This project is licensed under the MIT License. See the <a href="LICENSE">LICENSE</a> file for details.</p>
    </div>
</body>
</html>
