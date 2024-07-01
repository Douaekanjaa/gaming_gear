<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <style>
        body {
            background-color: #f8f9fa !important;
            color: #495057 !important;
        }
        #about-us {
            padding: 50px 0 !important;
        }
        h2 {
            color: #162c45 !important;
        }
    </style>
</head>
<body>
    @extends('layout')

    @section('content')
    <div class="container" id="about-us">
        <div>
            <h2 class="mb-4">Welcome to [Your Company Name]</h2>
            <p class="lead">
                At [Your Company Name], we are passionate about gaming. Our mission is to provide gamers with the best gear, ensuring an immersive and enjoyable gaming experience.
            </p>
        </div>

        <div class="mt-5">
            <h2>Why Choose Us?</h2>
            <p>
                <strong>Quality Products:</strong> We curate a selection of high-quality gaming gear from reputable brands, ensuring that every product meets the standards of performance and durability.
            </p>
            <p>
                <strong>Expertise:</strong> Our team consists of gaming enthusiasts who understand the unique needs of gamers. We're here to help you find the perfect gear for your gaming setup.
            </p>
            <p>
                <strong>Customer Satisfaction:</strong> Your satisfaction is our priority. We strive to provide excellent customer service, quick shipping, and hassle-free returns to make your shopping experience smooth and enjoyable.
            </p>
        </div>

        <div class="mt-5">
            <h2>Our Commitment</h2>
            <p>
                [Your Company Name] is committed to staying ahead of the gaming industry's trends. We continually update our product catalog to offer the latest and most innovative gaming gear. Your passion for gaming deserves the best, and we're here to deliver it.
            </p>
        </div>
    </div>
    @endsection
</body>
</html>
