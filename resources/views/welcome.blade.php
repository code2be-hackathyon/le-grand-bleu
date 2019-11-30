<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/template/css/landing-page.css">
    </head>
    <body>

    <!-- Navigation -->
{{--    <nav class="navbar navbar-light bg-light static-top">--}}
{{--        <div class="container">--}}
{{--            <a class="navbar-brand" href="#">Start Bootstrap</a>--}}
{{--            <a class="btn btn-primary" href="#">Sign In</a>--}}
{{--        </div>--}}
{{--    </nav>--}}

    <!-- Masthead -->
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">La grand bleu</h1>
                </div>
{{--                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">--}}
{{--                    <form>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-12 col-md-9 mb-2 mb-md-0">--}}
{{--                                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-md-3">--}}
{{--                                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
        </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-screen-desktop m-auto text-primary"></i>
                        </div>
                        <h3>Tableau de données</h3>
                        <p class="lead mb-0">Vittesse du vent</p>
                        <p class="lead mb-0">Direction du vent</p>
                        <p class="lead mb-0">Hauteur des vagues</p>
                        <p class="lead mb-0">Note /10</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Showcases -->
{{--    <section class="showcase">--}}
{{--        <div class="container-fluid p-0">--}}
{{--            <div class="row no-gutters">--}}

{{--                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>--}}
{{--                <div class="col-lg-6 order-lg-1 my-auto showcase-text">--}}
{{--                    <h2>Fully Responsive Design</h2>--}}
{{--                    <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row no-gutters">--}}
{{--                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>--}}
{{--                <div class="col-lg-6 my-auto showcase-text">--}}
{{--                    <h2>Updated For Bootstrap 4</h2>--}}
{{--                    <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row no-gutters">--}}
{{--                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>--}}
{{--                <div class="col-lg-6 order-lg-1 my-auto showcase-text">--}}
{{--                    <h2>Easy to Use &amp; Customize</h2>--}}
{{--                    <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- Testimonials -->
{{--    <section class="testimonials text-center bg-light">--}}
{{--        <div class="container">--}}
{{--            <h2 class="mb-5">What people are saying...</h2>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">--}}
{{--                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">--}}
{{--                        <h5>Margaret E.</h5>--}}
{{--                        <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">--}}
{{--                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">--}}
{{--                        <h5>Fred S.</h5>--}}
{{--                        <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">--}}
{{--                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">--}}
{{--                        <h5>Sarah W.</h5>--}}
{{--                        <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
{{--                <div class="col-xl-9 mx-auto">--}}
{{--                    <h2 class="mb-4">Ready to get started? Sign up now!</h2>--}}
{{--                </div>--}}
{{--                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">--}}
{{--                    <form>--}}
{{--                        <div class="form-row">--}}
{{--                            <div class="col-12 col-md-9 mb-2 mb-md-0">--}}
{{--                                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-md-3">--}}
{{--                                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-facebook fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-instagram fa-2x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>
