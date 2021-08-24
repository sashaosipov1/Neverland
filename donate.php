<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}

session_start();
require_once 'classes/Auth.class.php';

?>
<!DOCTYPE html>
<html lang="en" prefix="og:https://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Neverland - лучший игровой сервер для майнрафта</title>
        <meta name="description" content="Neverland - лучший игровой сервер для майнрафта, несколько разных сборок и серверов, постоянные обновления и ивенты.">
        <meta name="author" content="Neverland">
        <meta name="keywords" content="neverland донат, Neverland донат, never1and донат, Never1and донат, Лучший сервер майнрафта, Майнрафт сервер играть Neverland донат, Сервер neverland донат, Неверланд донат, Неверлэнд донат">
        <meta property="og:title" content="Neverland - лучший игровой сервер для майнрафта, несколько разных сборок и серверов, постоянные обновления и ивенты."/>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://never1and.ru" />
        <meta property="og:image" content="http://never1and.ru/images/Neverland_logo.png"/>
        <meta property="og:description" content="Neverland - лучший игровой сервер для майнрафта, несколько разных сборок и серверов, постоянные обновления и ивенты."/>
        <meta property="og:site_name" content="Сайт сервера Neverland по Майнрафту."/>







        <link rel="shortcut icon" href="images/Neverland_favico_32x32.png">



        <!-- magnific-popup css -->
        <link rel="stylesheet" href="css/magnific-popup.css">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/remixicon.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">

    </head>


    <body>



    <!-- Main Header -->
        <section class="section home home-register" id="home">
        <nav class="navbar navbar-expand-lg navbar-default navbar-dark navbar-custom navbar-custom-dark">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand logo" href="index.php">
                    <img src="images/Neverland_logo.png" class="logo" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav ml-auto navbar-center" id="mySidenav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link scroll big-phrase">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php#features" class="nav-link scroll big-phrase">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pricing" class="nav-link scroll big-phrase">Донат</a>
                        </li>

                        <li>
                        <?php if (Auth\User::isAuthorized()): ?>
                    	<li class="nav-item">
                        	<a class="nav-link big-phrase ml-50"><?php echo $_SESSION["user_id"];?></a>
                        </li>
                        <form class="ajax" method="post" action="./ajax.php">
                            <input type="hidden" name="act" value="logout">
                            <div class="form-actions">
                                <button class="btn btn-primary btn-sm btn_logout big-phrase" type="submit">Выйти</button>
                            </div>
                        </form>
                        <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <div class="home-wrapper">

                            <div class="text-tran-box text-tran-box-dark">
                                <h1 class="text-transparent  font-weight-medium ">Neverland</h1>
                            </div>

                            <p class="text-white-50">Лучшие сервера майнрафта от гениальной команды разработчиков.</p>
                                <img src="images/2.png" alt="mineman_1">
                                <img src="images/3.png" alt="mineman_2">
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-sm-4 offset-sm-2">
                        <div class="home-wrapper">
                        	<?php if (Auth\User::isAuthorized()==false): ?>
                            <div class="col-lg-12 main-registr">
                                <button id="show_form_signin" class="btn btn-primary btn-sm disabled">
                                    Регистрация
                                </button>
                                <button id="show_form_login" class="btn btn-primary btn-sm ">
                                    Войти
                                </button>
                            </div>

						         <form class="intro-form ajax" id="register_form" method="post" action="./ajax.php">
						         <h3 class="text-center">Присоединяйся прямо сейчас</h3>
						        <div class="main-error alert alert-error hide"></div>

						        <div class="form-group">
						            <input name="username" type="text" class="form-control" placeholder="Никнейм" required autofocus>
						        </div>
						        <div class="form-group">
						        <input name="password1" type="password" class="form-control" placeholder="Пароль" required>
						        </div>
						        <div class="form-group">
						        <input name="password2" type="password" id="signin_password_repeat" class="form-control" placeholder="Повторите пароль" required>
						        </div>
						        <input type="hidden" name="act" value="register">
						        <div class="form-group mb-0 text-center">
						        <button class="btn btn-primary btn-sm" id="btn_signin" type="submit">Зарегистрироваться</button>
						        </div>

						      </form>

                            <form id="login_form" class="intro-form ajax hide" method="post" action="./ajax.php">
                                <h3 class="text-center">Войти в личный кабинет</h3>
                                <div class="main-error alert alert-error hide"></div>
                                <div class="form-group">
                                    <input name="username"  id="login_nickname" type="text" class="form-control" placeholder="Никнейм" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input name="password" id="login_password" type="password" class="form-control" placeholder="Пароль" required>
                                </div>

                                <div class="form-group mb-0 text-center">

                                <input type="hidden" name="act" value="login">
                                <button class="btn btn-primary btn-sm" id="btn_login" type="submit">Войти</button>

                                </div>
                            </form>
                            <?php endif; ?>

                        </div>
                    </div>



                </div>
            </div>
        </section>

        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>

    <!-- Info Servers -->
        <section>
            <div class="container">
                <div class="row justify-content-center probel">
                    <div class="col-12">
                        <div class="facts-box text-center donate-name">
                            <div class="row ">
                                <h1>
                                    <div class="goo" contenteditable="true">Тут вы сможете ознакомиться с реквизитом внутриигровых покупок привилегий.</div>
                                </h1>

                                <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                    <defs>
                                        <filter id="goo"><feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                                            <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                                        </filter>
                                    </defs>
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="pricing" class="pricing py-5">
            <div class="container">
            	<div class="row">
                    <div class="col-lg-2"></div>
            		<div class="col-lg-4">
				        <div class="card mb-5 mb-lg-0">
				          <div class="card-body">
				            <h5 class="card-title text-muted text-uppercase text-center">V.I.P.</h5>
				            <h6 class="card-price text-center">20 Рублей<span class="period"></span></h6>
				            <hr>
				            <ul class="fa-ul">
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Открыть GUI верстака - /workbench</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Вылечить себя - /heal</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Потушить себя - /ext</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Восстановить голод - /feed</li>
				              <li><span class="fa-li"><i class="fas fa-times"></i></span>Надевать предметы на голову - /hat</li>
				              <iframe class="iframe-donate" src="https://yoomoney.ru/quickpay/button-widget?targets=%D0%94%D0%BE%D0%BD%D0%B0%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%20%D0%BC%D0%B0%D0%B9%D0%BD%D0%BA%D1%80%D0%B0%D1%84%D1%82&default-sum=20&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&mail=on&successURL=https%3A%2F%2Fnever1and.ru&quickpay=small&account=410016470849285&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
				            </ul>

				          </div>
				        </div>
				    </div>
				    <div class="col-lg-4">
				        <div class="card mb-5 mb-lg-0">
				          <div class="card-body">
				            <h5 class="card-title text-muted text-uppercase text-center">Креатив</h5>
				            <h6 class="card-price text-center">90 Рублей<span class="period"></span></h6>
				            <hr>
				            <ul class="fa-ul">
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Все команда V.I.P.</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Режим игры: "Креатив"</li>
                              <li><span class="fa-li"><i class="fas fa-check"></i></span>Быстро очистить инвентарь - /clear</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Установить время для себя - /ptime</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Доступна починка предметов - /repair</li>
				              <iframe class="iframe-donate" src="https://yoomoney.ru/quickpay/button-widget?targets=%D0%94%D0%BE%D0%BD%D0%B0%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%20%D0%BC%D0%B0%D0%B9%D0%BD%D0%BA%D1%80%D0%B0%D1%84%D1%82&default-sum=90&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&mail=on&successURL=https%3A%2F%2Fnever1and.ru&quickpay=small&account=410016470849285&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
				            </ul>

				          </div>
				        </div>
				    </div>
				    <div class="col-lg-2"></div>

            	</div>
            	<br>
            	<div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                          <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Премиум</h5>
                            <h6 class="card-price text-center">160 Рублей<span class="period"></span></h6>
                            <hr>
                            <ul class="fa-ul">
                              <li><span class="fa-li"><i class="fas fa-check"></i></span>Все команды V.I.P.</li>
                              <li><span class="fa-li"><i class="fas fa-check"></i></span>Режим игры: "Выживание"</li>
                              <li><span class="fa-li"><i class="fas fa-check"></i></span>Доступна починка предметов - /repair</li>
                              <iframe class="iframe-donate" src="https://yoomoney.ru/quickpay/button-widget?targets=%D0%94%D0%BE%D0%BD%D0%B0%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%20%D0%BC%D0%B0%D0%B9%D0%BD%D0%BA%D1%80%D0%B0%D1%84%D1%82&default-sum=160&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&mail=on&successURL=https%3A%2F%2Fnever1and.ru&quickpay=small&account=410016470849285&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                            </ul>
                          </div>
                        </div>
                    </div>
            		<div class="col-lg-4">
				        <div class="card mb-5 mb-lg-0">
				          <div class="card-body">
				            <h5 class="card-title text-muted text-uppercase text-center">Модератор</h5>
				            <h6 class="card-price text-center">230 Рублей<span class="period"></span></h6>
				            <hr>
				            <ul class="fa-ul">
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Доступен режим полёта - /fly</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Режим игры: "Выживание"</li>
                              <li><span class="fa-li"><i class="fas fa-check"></i></span>Все команды привилегии: "Креатив"</li>
				              <iframe class="iframe-donate"  src="https://yoomoney.ru/quickpay/button-widget?targets=%D0%94%D0%BE%D0%BD%D0%B0%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%20%D0%BC%D0%B0%D0%B9%D0%BD%D0%BA%D1%80%D0%B0%D1%84%D1%82&default-sum=230&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&mail=on&successURL=https%3A%2F%2Fnever1and.ru&quickpay=small&account=410016470849285&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
				            </ul>
				          </div>
				        </div>
				    </div>

				    <div class="col-lg-4">
				        <div class="card mb-5 mb-lg-0">
				          <div class="card-body">
				            <h5 class="card-title text-muted text-uppercase text-center">Администратор</h5>
				            <h6 class="card-price text-center">500 Рублей<span class="period"></span></h6>
				            <hr>
				            <ul class="fa-ul">
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Доступен режим бога - /god</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Вернуться на место смерти - /back</li>
				              <li><span class="fa-li"><i class="fas fa-check"></i></span>Все команды Модератора</li>
				              <iframe class="iframe-donate"  src="https://yoomoney.ru/quickpay/button-widget?targets=%D0%94%D0%BE%D0%BD%D0%B0%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80%20%D0%BC%D0%B0%D0%B9%D0%BD%D0%BA%D1%80%D0%B0%D1%84%D1%82&default-sum=500&button-text=12&any-card-payment-type=on&button-size=m&button-color=black&mail=on&successURL=https%3A%2F%2Fnever1and.ru&quickpay=small&account=410016470849285&" width="184" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
				            </ul>
				          </div>
				        </div>
				    </div>
				</div>
                <br>
                <br>

                <!-- Yandex.RTB R-A-672026-3 -->
				<div id="yandex_rtb_R-A-672026-3"></div>
				<script type="text/javascript">
				    (function(w, d, n, s, t) {
				        w[n] = w[n] || [];
				        w[n].push(function() {
				            Ya.Context.AdvManager.render({
				                blockId: "R-A-672026-3",
				                renderTo: "yandex_rtb_R-A-672026-3",
				                async: true
				            });
				        });
				        t = d.getElementsByTagName("script")[0];
				        s = d.createElement("script");
				        s.type = "text/javascript";
				        s.src = "//an.yandex.ru/system/context.js";
				        s.async = true;
				        t.parentNode.insertBefore(s, t);
				    })(this, this.document, "yandexContextAsyncCallbacks");
				</script>
            </div>
        </section>




        <div class="clearfix"></div>

        <!-- Footer start -->
        <footer class="footer-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="images/Neverland_logo.png" alt="logo" class="footer-logo" height="100">
                        <p class="about-text mt-4 pt-1">Neverland - лучший проект среди подобных.</p>
                    </div>

                    <!-- <div class="col-lg-2 col-sm-6">
                        <h5>Проект</h5>
                        <ul class="list-unstyled">
                            <li><a href="">О нас</a></li>
                            <li><a href="">Что-то</a></li>
                            <li><a href="">Что-то</a></li>
                            <li><a href="">Что-то</a></li>
                        </ul>
                    </div> -->



                    <div class="col-lg-4">
                        <div>
                            <h5>Свяжитесь с нами</h5>
                            <ul class="list-unstyled">
                                <li><strong class="font-secondary font-14">Отправьте свои пожелания на почту:</strong> <p>contact@never1and.ru</p></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <h5>Помощь</h5>
                        <ul class="list-unstyled">
                            <li><a href="#home" class="scroll" data-toggle="tooltip" data-placement="top" title="Для отправки требуется регистрация">Обратная связь</a></li>
                            <li><a href="">Политика конфиденциальности</a></li>
                            <li><a href="">Условия и соглашения</a></li>
                        </ul>
                    </div>

                </div> <!-- end row -->
            </div>
            <!-- end container -->

            <div class="footer-one-alt">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="font-13 copyright">© 2020 Neverland. Create by Neverland</p>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- Footer end -->



        <script src="./vendor/jquery-2.0.3.min.js"></script>
    	<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    	<script src="./js/ajax-form.js"></script>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>

        <!-- Jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- magnificpopup init -->
        <script src="js/magnificpopup.init.js"></script>
        <!--common script for all pages-->
        <script src="js/jquery.app.js"></script>

    </body>
</html>
