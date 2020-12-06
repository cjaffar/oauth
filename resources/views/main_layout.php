<!DOCTYPE html>
<html lang="en">
<head>
    <!-- template courtesy of https://pophonic.com/_brave-151210120/templates/pages/faq.html -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo (isset($title)) ? $title : 'Swordfish Test'; ?></title>

    
    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">

</head>
<body>


    <!-- Navigation menu -->
    <div class="navik-header header-shadow navik-mega-menu mega-menu-fullwidth">
        <div class="container">
            <div class="navik-header-container">
                
                <!--Logo-->
                <div class="logo">
                    <a href="/"><img src="/assets/imgs/Logo-1.png" alt="logo"/></a>
                </div>
                
                <!-- Burger menu -->
                <div class="burger-menu">
                    <div class="line-menu line-half first-line"></div>
                    <div class="line-menu"></div>
                    <div class="line-menu line-half last-line"></div>
                </div>
        
                <!--Navigation menu-->
                <nav class="navik-menu menu-hover-3 menu-caret submenu-top-border submenu-scale">
                    <ul>
                        <li><a href="/">Demo</a></li>
                        <li><a href="#">Menu 1</a>
                        </li>
                        <li class="mega-menu"><a href="#">Menu 2</a>
                            
                        </li>
                        <li><a href="#">Menu 3</a></li>
                        <li class="current-menu mega-menu"><a href="#">Menu 4</a>
                </nav>

            </div>
        </div>
    </div>

    <!-- Page title -->
    <div class="d-flex flex-column w-100">
        <div class="page-title d-flex align-items-center bg-image py-3">
            <div class="container page-title-container">
                <div class="row py-5">
                    <div class="col text-center">

                        <h1 class="display-3 font-weight-800 text-white mb-3">
                            Programming Assignment
                        </h1>

                        <div class="row">
                            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
<!--                                 <div class="lead text-white-75">
                                    You will need to authorize this App with Github

                                    <a href=""></a>
                                </div> -->

                        <div class="alert alert-primary alert-dismissible fade show mb-0" role="alert">
                            <h4 class="alert-heading"><?php echo ($authorized) ? 'Authorized App' : 'Unauthorized App'; ?>:</h4>
                            <p><?php echo $page_label; ?></p>
                            <hr>

                            <?php if(!$authorized) : ?>
                              <a href="/?action=auth" class="btn btn-round btn-lg btn-outline-dark mx-2 mx-lg-3 mb-0">Authorize App</a>
                            <?php endif; ?>

                            <?php if(isset($error_message)) : ?>
                              <p class="mb-0 alert alert-warning">
                                <?php echo $error_message; ?>
                              </p>
                            <?php endif; ?>

                        </div>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->

    <!-- content goes here -->

    <!-- Footer -->
    <div class="bg-viridian-500 text-white-50 py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 text-center text-lg-left mb-4 mb-lg-0">
                    <div class="widget">
                        <img class="img-fluid" src="/assets/imgs/Logo-1.png" alt="logo" data-width="146px" data-height="42px">
                    </div>
                </div>

                <div class="col-lg-6 text-center text-lg-right">
                    <div class="widget">
                        <small>&copy; <?php echo date('Y'); ?> All Rights Reserved.</small>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Go to top -->
    <div class="go-to-top">
        <a href="#" class="rounded-circle"><i class="fas fa-chevron-up"></i></a>
    </div>
    
    <!-- jQuery -->
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap.js"></script>

</body>
</html>