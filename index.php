<?php
@include 'config.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Intramuros</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Intramuros</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#places">Places</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About Intramuros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Our Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#booknow">Book Now!</a></li>
                        <?php
                            if(isset($_SESSION['admin_name'])) {
                                echo '<li class="nav-item"><a class="nav-link" href="admin_page.php">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="logout.php" onclick="return confirm(\'Are you sure you want to logout?\')">Logout</a></li>';
                            }
                            else if(isset($_SESSION['user_name'])) {
                                echo '<li class="nav-item"><a class="nav-link" href="user_page.php">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="logout.php" onclick="return confirm(\'Are you sure you want to logout?\')">Logout</a></li>';
                            }
                            else {
                                echo '<li class="nav-item"><a class="nav-link" href="login_form.php">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="register_form.php">Register</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Intramuros!</div>
                <div class="masthead-heading text-uppercase">The Philippines' Walled City</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Explore Now!</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Services offered by Intramuros and this website.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Booking</h4>
                        <p class="text-muted">Intramuros offers online booking services for reservation.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Gallery</h4>
                        <p class="text-muted">The Gallery is open for people to view the place they want to explore.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Security</h4>
                        <p class="text-muted">Secure transactions are guaranteed when booking to places.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Places Grid-->
        <section class="page-section bg-light" id="places">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Places</h2>
                    <h3 class="section-subheading text-muted">Great places to go into Intramuros.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Places item 1-->
                        <div class="places-item">
                            <a class="places-link" data-bs-toggle="modal" href="#placesModal1">
                                <div class="places-hover">
                                    <div class="places-hover-content"></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                            </a>
                            <div class="places-caption">
                                <div class="places-caption-heading">Fort Santiago</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Places item 2-->
                        <div class="places-item">
                            <a class="places-link" data-bs-toggle="modal" href="#placesModal2">
                                <div class="places-hover">
                                    <div class="places-hover-content"></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                            </a>
                            <div class="places-caption">
                                <div class="places-caption-heading">Baluarte</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Places item 3-->
                        <div class="places-item">
                            <a class="places-link" data-bs-toggle="modal" href="#placesModal3">
                                <div class="places-hover">
                                    <div class="places-hover-content"></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                            </a>
                            <div class="places-caption">
                                <div class="places-caption-heading">Manila Cathedral</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Places item 4-->
                        <div class="places-item">
                            <a class="places-link" data-bs-toggle="modal" href="#placesModal4">
                                <div class="places-hover">
                                    <div class="places-hover-content"></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                            </a>
                            <div class="places-caption">
                                <div class="places-caption-heading">Barbara's Restaurant</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <!-- Places item 5-->
                        <div class="places-item">
                            <a class="places-link" data-bs-toggle="modal" href="#placesModal5">
                                <div class="places-hover">
                                    <div class="places-hover-content"></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/5.jpg" alt="..." />
                            </a>
                            <div class="places-caption">
                                <div class="places-caption-heading">Casa Manila</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Places item 6-->
                        <div class="places-item">
                            <a class="places-link" data-bs-toggle="modal" href="#placesModal6">
                                <div class="places-hover">
                                    <div class="places-hover-content"></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/6.jpg" alt="..." />
                            </a>
                            <div class="places-caption">
                                <div class="places-caption-heading">Museo de Intramuros</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About Intramuros</h2>
                    <h3 class="section-subheading text-muted">A brief history of Intramuros.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Pre-Hispanic period</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">The strategic location of Manila along the bay and at the mouth of Pasig River made it an ideal location for the Tagalog tribes and kingdoms to trade with merchants from what would be today's China, India, Borneo, and Indonesia.

                                    At present-day Fort Santiago is where the polity of Maynila was located.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>1571–1762</h4>
                                <h4 class="subheading">Spanish conquest of Manila</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">In 1564, Spanish explorers led by Miguel López de Legazpi sailed from New Spain (now Mexico), and arrived on the island of Cebu on February 13, 1565, establishing the first Spanish colony in the Philippines.
                                Legazpi declared the area of Manila as the new capital of the Spanish colony on June 24, 1571, because of its strategic location and rich resources.
                            </p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>1898–1946</h4>
                                <h4 class="subheading">American period</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">After the end of the Spanish–American War, Spain surrendered the Philippines and several other territories to the United States as part of the terms of the Treaty of Paris for $20 million. The American flag was raised at Fort Santiago on August 13, 1898, indicating the start of American rule over the city.
                                 The Ayuntamiento became the seat of the Philippine Commission of the United States in 1901 while Fort Santiago became the headquarters of the Philippine Division of the United States Army.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">World War II and Japanese occupation</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">In December 1941, the Imperial Japanese Army invaded the Philippines.
                                 The first casualties in Intramuros brought by the war were the destruction of Santo Domingo Church and the original University of Santo Tomas campus during an assault.
                                 In 1945, the battle for the liberation of Manila began when American troops tried to occupy Manila in January 1945.
                                 Intense urban fighting occurred between the combined American and Filipino troops under the United States Army and Philippine Commonwealth Army including recognized guerrillas, against the 30,000 Japanese defenders.
                            </p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/5.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>1946–present</h4>
                                <h4 class="subheading">Contemporary period</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">In 1951, Intramuros was declared a historical monument and Fort Santiago, a national shrine with Republic Act 597, with the policy of restoring, reconstructing, and urban planning of Intramuros.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Contributors and developers of this website!</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.png" alt="..." />
                            <h4>Agency - Boostrap</h4>
                            <p class="text-muted">Template Idea</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Agency Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.png" alt="..." />
                            <h4>Lance Dalanon</h4>
                            <p class="text-muted">Frontend & Backend Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Lance Dalanon Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.png" alt="..." />
                            <h4>Wikipedia</h4>
                            <p class="text-muted">Information</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Wikipedia Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.png" alt="..." />
                            <h4>Jj Calma</h4>
                            <p class="text-muted">Frontend Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Jj Calma Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.png" alt="..." />
                            <h4>Lance Lira</h4>
                            <p class="text-muted">Frontend Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Lance Lira Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.png" alt="..." />
                            <h4>Charles Palomares</h4>
                            <p class="text-muted">Frontend Developer</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Charles Palomares Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">This site wouldn't be possible without the help of our great developers.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="booknow">
            <div class="container">
                <br>
                <br>
                <br>
                <br>
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Book Now!</h2>
                    <h3 class="section-subheading text-muted">Book online now for reservations!</h3>
                </div>
                <?php
                    if(isset($_SESSION['admin_name'])) {
                        echo '<form id="contactForm" action="sched.php">
                        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Click Here To Book</button></div>
                        </form>';
                    }
                    else if(isset($_SESSION['user_name'])) {
                        echo '<form id="contactForm" action="sched.php">
                        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Click Here To Book</button></div>
                        </form>';
                    }
                    else {
                        echo '<form id="contactForm" action="login_form.php">
                        <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Login To Book</button></div>
                        </form>';
                    }
                ?>
                <br>
                <br>
                <br>
                <br>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Intramuros 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Places Modals-->
        <!-- Places item 1 modal popup-->
        <div class="places-modal modal fade" id="placesModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Fort Santiago</h2>
                                    <p class="item-intro text-muted">The oldest Spanish bastion in the Philippines.</p>
                                    <a href="https://www.instantstreetview.com/@14.593533,120.970447,84.29h,1.72p,0z,CAoSLEFGMVFpcE44NXlFUW5oUHlyYUpHLXRrUDF0Y1NSVEo3Q2kzRHQ0a1habEJH"
                                    onclick="return confirm('Are you sure you want to continue? We are not affiliated with this website by any means')">
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." /></a>
                                    <p>The oldest Spanish stone fortification in the Philippines is Fort Santiago Intramuros,
                                        making it a noteworthy structure. Tourist destination in Intramuros
                                        The dungeons were utilized by Japanese soldiers during World War II
                                        to political prisoners and resistance fighters should be jailed.
                                        When you are in Intramuros, be certain not to miss this.
                                        In order to allow people to see the dungeons that were utilized as storage,
                                        the government has just now opened them to the public.
                                        Baluarte de Santa Barbara, a 1592-built stone building, contains vaults
                                        and cannon magazines.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Reservation Price:</strong>
                                            P 500.00
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Places item 2 modal popup-->
        <div class="places-modal modal fade" id="placesModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">BALUARTE</h2>
                                    <p class="item-intro text-muted">The oldest forts in the Historic Walled City.</p>
                                    <a href="https://www.instantstreetview.com/@14.585381,120.975567,349.55h,-63.4p,0.6z,CAoSLEFGMVFpcE04MFdtUTNsYUFvb2ROblZydkhRT0RxQ2V5QVRSUzRRSGd4VVRZ"
                                    onclick="return confirm('Are you sure you want to continue? We are not affiliated with this website by any means')">
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." /></a>
                                    <p>Baluarte of Intramuros, Philippines. During the Spanish era, this used as
                                        a chamber for drowning victims. Antonio Sedeno, a Jesuit priest,
                                        erected and created it in the late 1580s. Fort Nuestra
                                        Seora de Guia, a circular dungeon, is its primary feature.
                                        Baluarte de San Diego is now encircled by lovely gardens that are furnished
                                        with lush vegetation, walks, fountains, and a charming pergola that will
                                        make you think of a fairytale landscape.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Reservation Price:</strong>
                                            P 500.00
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Places item 3 modal popup-->
        <div class="places-modal modal fade" id="placesModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Manila Cathedral</h2>
                                    <p class="item-intro text-muted">The earliest cathedral in the Philippines</p>
                                    <a href="https://www.instantstreetview.com/@14.591873,120.973254,132.5h,20.16p,0z,nwr5mKJ2pAGUgkV0FFAYZQ"
                                    onclick="return confirm('Are you sure you want to continue? We are not affiliated with this website by any means')">
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." /></a>
                                    <p>The oldest Spanish stone fortification in the Philippines is Fort Santiago
                                        Intramuros, The earliest cathedral in the Philippines, the Manila Cathedral
                                        in Intramuros, is now known as the Premier Church of the Philippines.
                                        This tourist attraction in Intramuros is not the original building.
                                        Actually, despite going through a lot, the church still remains.
                                        It has seen a history that is worth telling to future generations,
                                        including ups and downs, wars, and love stories.
                                        One of the top attractions in Manila is without a doubt the Manila Cathedral.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Reservation Price:</strong>
                                            P 500.00
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Places item 4 modal popup-->
        <div class="places-modal modal fade" id="placesModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Barbara's Restaurant</h2>
                                    <p class="item-intro text-muted">A famous restaurant in Intramuros.</p>
                                    <a href="https://www.instantstreetview.com/@14.58941,120.975168,0.7h,14.4p,0z,TYypbcdcr2jKcF__THxIBw"
                                    onclick="return confirm('Are you sure you want to continue? We are not affiliated with this website by any means')">
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." /></a>
                                    <p>Barbara's Restaurant is a famous restaurant located
                                        inside the Walled City of Intramuros. It has a classic architecture
                                        which is popular in the 18th century.
                                        The restaurant offered a delicious Filipinos and Spanish recipes
                                        as well as other European dishes. As they gaines popularity they
                                        decided to expand their menusto serve more delicious dishes to the custmers.
                                        The restaurant is also hosting a Kultura Night, wherein there
                                        are members of the Folkloricl Filipino Dance Company who dance the
                                        sinkil of Mindanao, Tinikling of Visayas,
                                        Pandango sa Ilaw of Luzon and other traditional dances that goes
                                        along to the beat of the Filipino Folk Songs.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Reservation Price:</strong>
                                            P 500.00
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Places item 5 modal popup-->
        <div class="places-modal modal fade" id="placesModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">CASA MANILA</h2>
                                    <p class="item-intro text-muted">The living house of Intramuros.</p>
                                    <a href="https://www.instantstreetview.com/@14.589604,120.975297,182.56h,-21.31p,0.14z,nzepZ5QRi10OQ2QC_RiBPA"
                                    onclick="return confirm('Are you sure you want to continue? We are not affiliated with this website by any means')">
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." /></a>
                                    <p>The main feature of this Intramuros tourist attraction is a well-equipped
                                        museum showing how Filipinos lived during colonial times.
                                        Toilets are the most prominent luxury item at Casa Manila.
                                        Historically, toilets were arranged in pairs or more so that people could sit side by side
                                        and converse while working. Casa Manila is of the beauty of Intramuros.
                                        The restaurant served delicious Filipino and Spanish also an example cuisine,
                                        as well as a variety of European favorites.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Reservation Price:</strong>
                                            P 500.00
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Places item 6 modal popup-->
        <div class="places-modal modal fade" id="placesModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Museo de Intramuros</h2>
                                    <p class="item-intro text-muted">Historical museum gallery in Intramuros.</p>
                                    <a href="https://www.instantstreetview.com/@14.589849,120.973535,310.71h,18.07p,0z,gkXNDdr6dgWI0XU7GZzbPg"
                                    onclick="return confirm('Are you sure you want to continue? We are not affiliated with this website by any means')">
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." /></a>
                                    <p>Museo Filipino is a historical museum gallery in Intramuros, Manila (just behind Manila Cathedral) that gives tourists a birds-eye view
                                         (30-minute crash course) on Philippine history. Using illustrations procured from the early 19th century, pictures from the US Library of Congress, and other sources,
                                          Museo Filipino narrates Philippine history from the pre-colonial period until the present-day administration. It is a good jump off point in Intramuros because it also
                                           highlights the owners' favorite places of interest in Intramuros, such as the Memorare, the gardens, the wall, the monuments of Queen Isabella and King Philip of Spain, etc.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Reservation Price:</strong>
                                            P 500.00
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
