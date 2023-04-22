<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Natural Suite</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <link href="<?= base_url(); ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url(); ?>assets/css/styles-front.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/utility.css" rel="stylesheet" />

</head>

<body id="page-top" data-baseurl="<?= base_url(); ?>">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="<?= base_url(); ?>assets/img/logo.png" alt="..." style="width:35%; height:35%;" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Realizar Reserva</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Catalogo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
                    <li id="menuRegisterLogin" class="nav-item"></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container" style="background:#0000009c;">
            <div class="masthead-subheading">¡Bienvenido a Natural Suite!</div>
            <div class="masthead-heading text-uppercase">¡Reserva Ya!</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Realizar tu reserva</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Solicitud de reserva</h2>
                <h3 class="section-subheading text-muted">Has tu reserva en el siguiente formulario</h3>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form id="solicitud">
                        <div class="row">
                            <div class="col-md-3 mb-3 text-center">
                                <label for="fechaIni">Fecha de llegada</label>
                                <input id="fechaIni" name="fechaIni" type="date" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3 text-center">
                                <label for="fechaFin">Fecha de salida</label>
                                <input id="fechaFin" name="fechaFin" type="date" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3 text-center">
                                <label for="tipoHabitacion">Habitacion de hospedaje</label>
                                <select id="tipoHabitacion" name="tipoHabitacion" class="form-control">
                                </select>
                            </div>
                            <div class="col-md-2 mb-3 mt-4 text-center">
                                <input id="btnProcesar" class="form-control btn btn-dark" type="submit" value="Reservar." />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Galeria</h2>
                <h3 class="section-subheading text-muted">A continuacion nuestra galeria</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid" src="<?= base_url(); ?>assets/img/portfolio/1.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Entrada</div>
                            <div class="portfolio-caption-subheading text-muted">Nuestra entrada del hotel</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid" src="<?= base_url(); ?>assets/img/portfolio/2.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Habitación</div>
                            <div class="portfolio-caption-subheading text-muted">Una de nuestras habitaciones.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid" src="<?= base_url(); ?>assets/img/portfolio/3.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Recepción.</div>
                            <div class="portfolio-caption-subheading text-muted">Asi es nuestra recepción</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid" src="<?= base_url(); ?>assets/img/portfolio/4.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Habitación Duo</div>
                            <div class="portfolio-caption-subheading text-muted">Nuestra habitación duo.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid" src="<?= base_url(); ?>assets/img/portfolio/5.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Familiar.</div>
                            <div class="portfolio-caption-subheading text-muted">Una de nuestras habiataciones familiares.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"></div>
                            </div>
                            <img class="img-fluid" src="<?= base_url(); ?>assets/img/portfolio/6.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Habitación de amigos/as</div>
                            <div class="portfolio-caption-subheading text-muted">Habitación para compartir en amigos/as</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container text-center">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nosotros</h2>
                <h3 class="section-subheading text-muted">A continuacion presentamos nuestros objetivos como empresa.</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-address-book fa-address-book fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Misión:</h4>
                    <p class="text-muted">Ofrecer a nuestros huéspedes una experiencia única en un ambiente natural y acogedor, con atención personalizada y servicios de calidad que satisfagan sus necesidades y expectativas.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-signal fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Visión:</h4>
                    <p class="text-muted">Ser reconocidos como un destino turístico de referencia en la zona de montaña, a través de la innovación constante en la oferta de servicios y la excelencia en la atención al cliente.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Valores:</h4>
                    <p class="text-muted">
                    Satisfacción del cliente: trabajamos para superar las expectativas de nuestros huéspedes, brindándoles una experiencia inolvidable en nuestro hostal.<br/>
                    -Compromiso con la calidad: ofrecemos servicios y productos de alta calidad, buscando siempre la mejora continua de nuestros procesos.<br/>
                    -Responsabilidad social y ambiental: somos conscientes de nuestro impacto en la comunidad y el entorno natural, por lo que nos comprometemos a actuar de manera sostenible y responsable.<br/>
                    -Trabajo en equipo: fomentamos un ambiente de colaboración y respeto, en el que cada miembro del equipo pueda aportar sus habilidades y conocimientos.<br/>
                    -Innovación: buscamos estar a la vanguardia en la oferta de servicios turísticos, a través de la implementación de nuevas tecnologías y prácticas innovadoras.<br /></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Natural Suite 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Politicas de privacidad</a>
                    <a class="link-dark text-decoration-none" href="#!">Terminos de uso</a>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="loginRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Login</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Register</a>
                        </div>
                    </nav>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="col-lg-12">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                                    </div>
                                    <form class="user" id="loginForm">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="correoLogin" name="correoLogin" placeholder="Introducir la dirección de correo electrónico...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="claveLogin" name="claveLogin" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Iniciar sesión" />
                                        <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Iniciar sesión con Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Iniciar sesión con Facebook

                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">¿Has olvidado tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">¡Crea una cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="col-lg-12">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registrate con nosotros</h1>
                                    </div>
                                    <form class="user" id="registerForm">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nameRegister" name="nameRegister" placeholder="Introducir tu nombre o nombres">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="lastRegister" name="lastRegister" placeholder="Introducir tu apellido o apellidos">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-user" id="fechaNacRegister" name="fechaNacRegister" placeholder="Introducir tu fecha de nacimiento">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="correoRegister" name="correoRegister" placeholder="Introducir un correo de registro">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group input-group m-0">
                                                <input type="password" class="form-control form-control-user" id="claveRegister" name="claveRegister" placeholder="Introducir una clave de registro">
                                                <div class="input-group-append">
                                                    <a href="#" id="mostrarPass" class="border_left_bth btn btn-omni" style="padding: 0.75rem;">
                                                        <span class="fa fa-eye-slash icon"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group input-group m-0">
                                                <input type="password" class="form-control form-control-user" id="claveConfimRegister" name="claveConfimRegister" placeholder="Introducir una clave de registro">
                                                <div class="input-group-append">
                                                    <a href="#" id="mostrarPass2" class="border_left_bth btn btn-omni" style="padding: 0.75rem;">
                                                        <span class="fa fa-eye-slash icon"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-success btn-user btn-block" value="Registrarse" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery-validate-additional-methods.min.js"></script>

    <!-- Core theme JS-->
    <script src="<?= base_url(); ?>assets/js/scripts-front.js"></script>

    <script src="<?= base_url(); ?>assets/js/components/initialazer.js" type="module"></script>
</body>

</html>