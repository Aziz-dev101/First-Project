<?php 
require_once __DIR__."/../controllers/RestaurantController.php";
require_once __DIR__."/../config/config.php";
$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$RC = new RestaurantController($pdo);

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['message'])): ?>
    <div class="alert alert-info"><?php echo htmlspecialchars($_GET['message']); ?></div>
<?php endif;
 $RC->showRestaurantPage($_GET['id']);
 var_dump(value: $RC);

// Define the variables with default values
$coverImagePath = isset($coverImagePath) ? $coverImagePath : '../imgs/default.jpg'; // Set a default path
$description = isset($description) ? $description : 'Welcome to our restaurant! Enjoy a delightful dining experience.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="../index.css">
    <style>
        .has-img-bg {
            background-size: cover;
            background-position: center;
            height: 100%;
            min-height: 400px;
        }
    </style>
</head>
<body>
        
    <!-- About Section -->
    <div id="about" class="container-fluid wow fadeIn" data-wow-duration="1.5s">
        <div class="row">
            <div class="col-lg-6 has-img-bg" style="background-image: url('<?= htmlspecialchars($coverImagePath) ?>');">
                <!-- You can add content overlay here if needed -->
            </div>
            <div class="col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-sm-8 py-5 my-5">
                        <h2 class="mb-4">About Us</h2>
                        <p><?= htmlspecialchars($description) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <h2 class="section-title mb-5">BOOK A TABLE</h2>
        <form id="reservation-form"> <!-- Added form tag -->
            <div class="row mb-5" style="display: flex; align-items: center; justify-content: center;">
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <select id="time-select" class="form-control custom-select" aria-label="Select Time" required>
                        <option value="" disabled selected>Select Time</option>
                        <option value="morning">Morning (7:00 am - 12:00 pm)</option>
                        <option value="afternoon">Afternoon (12:00 pm - 6:00 pm)</option>
                        <option value="night">Night (6:00 pm - 12:00 am)</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="number" id="number-of-guests" class="form-control form-control-lg custom-form-control" placeholder="NUMBER OF GUESTS" max="20" min="0" required>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="date" id="reservation-date" class="form-control form-control-lg custom-form-control" required>
                </div>
                <input type="hidden" id="restaurant-id" value="<?= htmlspecialchars($restaurantId); ?>"> <!-- Restaurant ID -->
            </div>
            <button class="btn btn-lg btn-primary" id="reserve-btn">FIND TABLE</button>
            <div id="reservation-message"></div> <!-- Message will be displayed here -->
        </form> <!-- Closed form tag -->
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="trends" role="tabpanel" aria-labelledby="pills-trends-tab">
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-transparent border my-3 my-md-0">
                        <img src="../imgs/blog-1.jpg" alt="Bestseller 1" class="rounded-0 card-img-top img-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4">
                                <a href="#" class="badge badge-primary">$5</a>
                            </h1>
                            <h4 class="pt-20 pb-20">Top 2 </h4>
                            <p class="text-white">Description of Bestseller 1.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-transparent border my-3 my-md-0">
                        <img src="../imgs/blog-2.jpg" alt="Bestseller 2" class="rounded-0 card-img-top img-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$12</a></h1>
                            <h4 class="pt20 pb20">Top 1 </h4>
                            <p class="text-white">Description of Bestseller 2.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-transparent border my-3 my-md-0">
                        <img src="../imgs/blog-3.jpg" alt="Bestseller 3" class="rounded-0 card-img-top img-responsive">
                        <div class="card-body">
                            <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">$8</a></h1>
                            <h4 class="pt20 pb20">Top 3</h4>
                            <p class="text-white">Description of Bestseller 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="view-menu" role="tabpanel" aria-labelledby="pills-menu-tab">
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <div class="card-body">
                            <h4 class="card-title">Menu Item 1</h4>
                            <p class="card-text">Description of Menu Item 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <div class="card-body">
                            <h4 class="card-title">Menu Item 2</h4>
                            <p class="card-text">Description of Menu Item 2.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card bg-transparent border">
                        <div class="card-body">
                            <h4 class="card-title">Menu Item 3</h4>
                            <p class="card-text">Description of Menu Item 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <div id="reviews" class="container-fluid bg-dark text-light py-5 text-center">
        <h2 class="section-title py-5">REVIEWS</h2>
        <div class="row">
            <div class="col-md-4 my-3">
                <div class="card bg-transparent border">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">"Amazing experience! The food was fantastic!"</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-3">
                <div class="card bg-transparent border">
                    <div class="card-body">
                        <h4 class="card-title">Jane Smith</h4>
                        <p class="card-text">"Loved the ambiance and the service!"</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-3">
                <div class="card bg-transparent border">
                    <div class="card-body">
                        <h4 class="card-title">Mike Johnson</h4>
                        <p class="card-text">"Best dining experience I've had in a while!"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- CONTACT Section  -->
     <div id="contact" class="container-fluid bg-dark text-light border-top wow fadeIn">
        <div class="row">
            <!--<div class="col-md-6 px-0">
                <div id="map" style="width: 100%; height: 100%; min-height: 400px"></div>
            </div> -->
            <div class="col-md-12 px-5 has-height-lg middle-items">
                <h3>FIND US</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, laboriosam doloremque odio delectus, sunt magnam laborum impedit molestiae, magni quae ipsum, ullam eos! Alias suscipit impedit et, adipisci illo quam.</p>
                <div class="text-muted">
                    <p><span class="ti-location-pin pr-3"></span> 12345 Fake ST NoWhere, AB Country</p>
                    <p><span class="ti-support pr-3"></span> (123) 456-7890</p>
                    <p><span class="ti-email pr-3"></span>info@website.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="container-fluid py-5 text-center">
    <h2 class="section-title py-5">SHARE YOUR EXPERIENCE</h2>

    <form method="POST" action="../submit_comment.php"> <!-- Change to your controller's path -->
    <div class="row justify-content-center">
        <div class="col-md-8 my-2"> <!-- Adjusted to occupy more space -->
            <div class="comment-container">
                <label for="comment" class="comment-label">Add a Comment:</label>
                <textarea id="comment" name="comment" class="comment-input" placeholder="Write your comment here..." required></textarea>
            </div>
        </div>
    </div>
    <input type="hidden" name="restaurant_id" value="<?php echo htmlspecialchars($_GET['id']); ?>"> <!-- Hidden field for restaurant ID -->
    <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
</form>
</div>


    <!-- Footer Section -->
    <footer class="bg-dark text-light text-center py-4">
        <p>&copy; 2024 Restaurant Name. All rights reserved.</p>
    </footer>
    <script src="ReservationJS.js"></script>
</body>
</html>

