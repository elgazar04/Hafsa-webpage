<?php 

@include_once 'sorah.php';

$loggedIn= false;
session_start();
if(isset($_SESSION['user'])){
    $loggedIn = true;}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>THEMosque - Mosque Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        

    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Topbar start -->
        <div class="container-fluid fixed-top">
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mb-0">THE<span class="text-primary">Mosque</span> </h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav ms-lg-auto mx-xl-auto">
                            <?php if ($loggedIn) { ?>
                            <a href="user.php"  class="nav-item nav-link active">Home</a>
                            <?php }?>
                            <div class="nav-item dropdown">
                                <a href="index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Library</a>
                                <div class="dropdown-menu m-0 rounded-0">
                                    <a href="index.php#quran" class="dropdown-item">Quran Audio</a>
                                    <a href="index.php#calender" class="dropdown-item">Islamic Calender</a>
                                    <a href="index.php#blog" class="dropdown-item">Daily content</a>
                                </div>
                            </div>
                            <?php if ($loggedIn) { ?>
                                <a href="UserProfile.php" class="nav-item nav-link">Profile</a>
                            <?php }?>
                            </div>
                            <?php if (!$loggedIn) { ?>
                            <a href="SignUp.php" class="nav-item nav-link">Sign Up</a>
                            <?php }?>
                    </div>
                        <?php if (!$loggedIn) { ?>
                        <a href="SignIn.php" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Login</a>
                        <?php }?>
                        <?php if ($loggedIn) { ?>
                        <a href="LogOut.php" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">logout</a>
                            <?php }?>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Topbar End -->

        <?php if (!$loggedIn) { ?>
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <p class="fs-4 text-dark">WELCOME TO THEMosque</p>
                            <h1 class="display-1 mb-5 text-dark">Purity Comes From Faith</h1>
                            <a href="SignIn.php" class="btn btn-primary py-3 px-5">Login Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
        <!-- Hero End -->




        <!-- Activities Start -->
        <div id="Library" class="container-fluid activities py-5 ">
            <div class="container py-5 mt-4">
                <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <p class="fs-5 text-uppercase text-primary">Activities</p>
                    <h1 class="display-3">Here Is a Summery Activities</h1>
                </div>

                
                <div class="row g-4">
                    <div class="col-lg-6 col-xl-4">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                            <i class="fa fa-mosque fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h4>Accurate Prayer Time</h4>
                                <p class="mb-4">Know accurate prayer times in your city.</p>
                                <?php if(!$loggedIn) { ?>
                                <a href="SignIn.php" class="btn btn-primary px-3">Login In</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
                            <i class="fa fa-donate fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h4>Full Quran Audio</h4>
                                <p class="mb-4">Enjoy a library of high quality Quran audio</p>
                                <?php if(!$loggedIn) { ?>
                                <a href="SignIn.php" class="btn btn-primary px-3">Login In</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-quran fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h4>Never Miss Praying on Time</h4>
                                <p class="mb-4">Our system will notify you when it’s time for pray</p>
                                <?php if(!$loggedIn) { ?>
                                <a href="SignIn.php" class="btn btn-primary px-3">Login In</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
                            <i class="fa fa-book fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h4>Halal Resturants</h4>
                                <p class="mb-4">Halal resturants Recommendation</p>
                                <?php if(!$loggedIn) { ?>
                                <a href="SignIn.php" class="btn btn-primary px-3">Login In</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
                            <i class="fa fa-book-open fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h4>Navigate your Khatma</h4>
                                <p class="mb-4">Our system will memorise you with your progress in quran and track the number of finishing khatma within a month</p>
                                <?php if(!$loggedIn) { ?>
                                <a href="SignIn.php" class="btn btn-primary px-3">Login In</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-hands fa-4x text-dark"></i>
                            <div class="ms-4">
                                <h4>Calculate Your Zakah</h4>
                                <p class="mb-4">Our system provides an easy interface to calculate your zakah</p>
                                <?php if(!$loggedIn) { ?>
                                <a href="SignIn.php" class="btn btn-primary px-3">Login In</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Activities Start -->


        <!-- Quran Start -->
        <div id="quran" class="container-fluid activities py-5 ">
            <div class="container py-5 mt-4">
                <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <p class="fs-5 text-uppercase text-primary">Quran</p>
                    <h1 class="display-3">Listen to Your Favourate Sheikh</h1>
                    
                </div>
                <div class="d-grid gap-2">
    

                    <?php foreach($Shikhs as $shekh){?>

                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $shekh['name']?>" aria-expanded="false" aria-controls="<?php echo $shekh['name']?>"><?php echo $shekh['name']?></button>
                            <div class="collapse mt-3" id="<?php echo $shekh['name']?>">
    
                                <?php foreach($Quran as $Sura ){?>

                                         <div class="card card-body"><?php echo  '<a href="https://quranmp3.jo1jo.com/'. $shekh['name'] .'/' . $Sura['id'] . '.mp3">' . $Sura['name'] .'</a>' ?></div>
                                <?php } ?>

                            </div>

                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Quran Start -->




        <!-- Calender Start -->
        <div id="calender" class="container-fluid activities py-5 ">
            <div class="container py-5 mt-4">
                <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <p class="fs-5 text-uppercase text-primary">Islamic Calender</p>
                    <h1 class="display-3">Explore The Islamic Calender</h1>
                </div>
            </div>
        </div>
        <!-- Calender Start -->


        <!-- Blog Content Start -->
        <div id="blog" class="container-fluid activities py-5 ">
            <div class="container py-5 mt-4">
                <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <p class="fs-5 text-uppercase text-primary">Our Daily Content</p>
                
                    <?php 

                    $counter =0;
                    ?> 
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                      <div class="carousel-inner">

                      <?php foreach($dailyexample as $unit) { ?>
                    
                      <div class="carousel-item <?php echo $counter?'':'active' ;?>">
                    
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"><?php echo $unit['versus']?> </h5>
                              <p class="card-text"> <?php echo $unit['duas']?></p>
                            </div>
                            <div class="card-footer text-muted"><?php echo $unit['hadith']?></div>
                          </div>
                    
                        </div>
                    
                        <?php $counter++; } ?>
                    
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- Blog Start -->

        <div class="container-fluid footer pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row py-5">
                    <div class="col-12">
                        <div class="border-top border-secondary"></div>
                    </div>
                </div>
                <div class="row g-4 footer-inner">
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="footer-item mt-5">
                            <h4 class="text-light mb-4">THE<span class="text-primary">Mosque</span></h4>
                            <p class="mb-4 text-secondary">Nostrud exertation ullamco labor nisi aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                            <?php if ($loggedIn) { ?>
                                <a href="LogOut.php" class="btn btn-primary py-2 px-4">Logout</a>
                                <?php } else{?>
                                    <a href="SignIn.php" class="btn btn-primary py-2 px-4">Login Now</a>
                                    <a href="AdminSignIn.php" class="btn btn-outline-primary py-2 px-4">Admin ? </a>
                                    <?php }?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="footer-item mt-5">
                            <h4 class="text-light mb-4">Explore Link</h4>
                            <div class="d-flex flex-column align-items-start">
                            <?php if ($loggedIn) { ?>
                                <a class="text-body mb-2" href="user.php"><i class="fa fa-check text-primary me-2"></i>Home</a>
                                <?php }?>
                                <a class="text-body mb-2" href="index.php"><i class="fa fa-check text-primary me-2"></i>Library</a>
                                <a class="text-body mb-2" href="index.php#quran"><i class="fa fa-check text-primary me-2"></i>Quran Audio</a>
                                <a class="text-body mb-2" href="index.php#calender"><i class="fa fa-check text-primary me-2"></i>Islamic Calender</a>
                                <a class="text-body mb-2" href="index.php#blog"><i class="fa fa-check text-primary me-2"></i>Daily content</a>
                                <?php if ($loggedIn) { ?>
                                <a class="text-body mb-2" href="profile.php"><i class="fa fa-check text-primary me-2"></i>Profile</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-4">
                <div class="border-top border-secondary pb-4"></div>
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-light back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        
    </body>

</html>