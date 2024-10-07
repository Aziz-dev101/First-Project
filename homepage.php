<?php error_log(print_r($restaurants, true)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with FoodHut landing page.">
    <meta name="author" content="Devcrud">
    <title>FoodHut </title>
   
    <!-- font icons -->
    <link rel="stylesheet" href="../assets/vendors/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="../assets/vendors/animate/animate.css">

    <!-- Bootstrap + FoodHut main styles -->
	<link rel="stylesheet" href="css/index.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallary</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Good Bite</span>
            </a>
            <ul class="navbar-nav">
               
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <?php if($isLoggedIn) : ?>
                <a href="logout.php" class="btn btn-primary ml-xl-4">logout</a>
                   <?php else : ?>
                <a href="views/login.php" class="btn btn-primary ml-xl-4">login</a>
                   <?php endif; ?>
                   </li>
                
            </ul>
        </div>
    </nav>
    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">Good Bite</h1>
            <h2 class="display-4 mb-5">Always fresh &amp; Insightful</h2>
            <a class="btn btn-lg btn-primary" href="#gallary">View Our gallary</a>
        </div>
          <!-- Add the restaurant image here -->

    </header>
    <!-- Display Restaurant Image -->
   


    <!--  About Section  -->
    <div id="about" class="container-fluid wow fadeIn" id="about"data-wow-duration="1.5s">
        <div class="row">
            <div class="col-lg-6 has-img-bg"></div>
            <div class="col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-sm-8 py-5 my-5">
                        <h2 class="mb-4">About Us</h2>
                        <p>
    Welcome to GoodBite, where we celebrate the vibrant world of culinary experiences.<br>
    Our platform is dedicated to connecting food enthusiasts with a diverse range of restaurants, eateries, and food creators, offering a unique opportunity to explore and indulge in gastronomic delights.
</p>
<p>
    At Good Bite, we believe that food is more than just sustenance; it’s a cultural experience that brings people together.<br>
    Our mission is to create a community where food lovers can discover hidden gems, share their favorite dining experiences, and support local businesses.
</p>
<p>
    Whether you're searching for a cozy café, an upscale restaurant, or a food truck with mouthwatering street food,<br>
    our user-friendly platform allows you to browse, review, and connect with a variety of culinary options tailored to your tastes.<br>
    With comprehensive restaurant profiles, user-generated reviews, and engaging food-related content, we strive to enhance your dining adventures.
</p>
<p>
    Join us as we embark on a journey to explore the rich tapestry of flavors and cultures that make up our food landscape.<br>
    At Good Bite, every meal is an opportunity to create memories, connect with others, and celebrate the joy of good food.
</p>
<p>
    Welcome to our community—where every bite tells a story!
</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  gallary Section  -->
<!--  Gallary Section  -->
<div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
    <h2 class="section-title" style="z-index:999;">Restaurant Gallery</h2>
    <div class="row">
    <?php foreach ($restaurants as $restaurant) : ?>
        <div class="col-md-4">
            <div class="gallery-item">
                <?php if (!empty($restaurant['cover_image_path'])) : ?>
                    <a href="views/restaurant.php?id=<?php echo htmlspecialchars($restaurant['id']); ?>"> <!-- Fixed the concatenation here -->
                        <img src="<?php echo htmlspecialchars($restaurant['cover_image_path']); ?>" 
                             alt="<?php echo htmlspecialchars($restaurant['name']); ?>" 
                             class="img-fluid">
                    </a>
                <?php else : ?>
                    <img src="assets/imgs/default-restaurant.jpg" alt="Default Restaurant" class="img-fluid"> <!-- Fallback image -->
                <?php endif; ?>
                <h4 class="restaurant-name">
                    <a href="views/restaurant.php?id=<?php echo htmlspecialchars($restaurant['id']); ?>"><?php echo htmlspecialchars($restaurant['name']); ?></a>
                </h4>
            </div>
        </div>
    <?php endforeach; ?>
</div>

   
    <!-- page footer  -->
    <div class="container-fluid bg-dark text-light has-height-md middle-items border-top text-center wow fadeIn">
        <div class="row">
            <div class="col-sm-4">
                <h3>EMAIL US</h3>
                <P class="text-muted">info@GoodBite.com</P>
            </div>
            <div class="col-sm-4">
                <h3>CALL US</h3>
                <P class="text-muted">(+216) 00000000</P>
            </div>
            <div class="col-sm-4">
                <h3>FIND US</h3>
                <P class="text-muted">12345 Fake ST NoWhere In The World</P>
            </div>
        </div>
    </div>
    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Made with <i class="ti-heart text-danger"></i> By <a href="http://devcrud.com">DevCRUD</a></p>
    </div>
    <!-- end of page footer -->

	<!-- core  -->
    <script src="../assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="../assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="../assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="../assets/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="../assets/js/foodhut.js"></script>

</body>
</html>