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
        <meta name="keywords" content="neverland, Neverland, never1and, Never1and, Лучший сервер майнрафта, Майнрафт сервер играть Neverland, Сервер neverland, Неверланд, Неверлэнд, Сервер майнрафт 1.12.2, Сервер с плагинами, Сервер с модами 1.12.2, Сервер Neverland с плагинами и модами">
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
    <!-- Navbar -->
    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(69328150, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/69328150" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

<!-- /Yandex.Metrika counter -->


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
                            <a href="#home" class="nav-link scroll big-phrase">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" class="nav-link scroll big-phrase">О нас</a>
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

                                    <div id="loader">
                                        <div class="loader-inner">
                                            <img src="images/loader.gif" alt="">
                                        </div>
                                    </div>

						         <h3 class="text-center">Присоединяйся прямо сейчас</h3>
						        <div class="main-error alert alert-error hide"></div>

						        <div class="form-group">
						            <input name="username" type="text" class="form-control" placeholder="Никнейм" required >
						        </div>
						        <div class="form-group">
						        <input name="password1" type="password" class="form-control" placeholder="Пароль" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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
                                    <div id="loader">
                                        <div class="loader-inner">
                                            <img src="images/loader.gif" alt="">
                                        </div>
                                    </div>
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
                            <?php if (Auth\User::isAuthorized()==true): ?>

                    <form id="feedback_form" class="intro-form ajax" method="post" action="./ajax.php">
                                    <div id="loader">
                                        <div class="loader-inner">
                                            <img src="images/loader.gif" alt="">
                                        </div>
                                    </div>
                                <h3 class="text-center">Оставьте отзыв или пожелание <br>на почту: contact@never1and.ru</h3>
                                <div class="main-error alert alert-error hide"></div>
                                <div class="form-group">
                                	<label>Введите Вашу почту </label>
						            <input type="email" id="feedback_email" class="form-control" name="email" placeholder="first.last@example.com" required="required">
						        </div>
						        <div class="form-group">
								    <label>Напишите отзыв</label>
								    <textarea class="form-control" id="feedback_text" required="required" name="feedback" rows="5"></textarea>
								</div>

                                <div class="form-group mb-0 text-center">

                                <input type="hidden" name="act" value="feedback">
                                <button class="btn btn-primary btn-sm" id="btn_feedback" type="submit">Отправить</button>

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
                        <div class="facts-box text-center">
                            <div class="row">

                                <div class="col-sm-5">
                                	<div class="row">
                                		<div class="col-6 text-left">
                                    	<h3 class="pl-2">Название</h3>
                                    	<button class="btn-primary name-server" onclick="copytext('#text1')" id="text1" data-toggle="tooltip" data-placement="top" title="Нажми на название и айпи скопируется в буфер!">Vanilla Версия 1.12.2</button>
	                                </div>

	                                <div class="col-6">
	                                    <h3>Ip сервера</h3>
	                                    <p class="text-muted">188.134.84.134</p>
	                                </div>
                                	</div>
                                </div>

                                <div class="col-sm-2 col-6">
                                    <h3>Игроки</h3>
                                    <p class="text-muted" id="playersCount"></p>
                                </div>

                                <div class="col-sm-5">
                                	<div class="row">
                                		<div class="col-6">
                                    <h3>Status</h3>
                                    <div class="text-muted"><div class="w-2 h-2 rounded-full mt-2 ml-2 bg-notify-success"></div>Online</div>
                                </div>

                                <div class="col-6">
                                    <h3>Подключиться</h3>
                                    <img src="images/play.png" class="play" onclick="copytext('#text1')" id="text1" data-toggle="tooltip" data-placement="top" title="Нажми на название и айпи скопируется в буфер!">
                                    <img src="images/play-green.png" id="text2" class="play play-green hide">
                                </div>
                                	</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <div class="clearfix"></div>

    <!-- 3 Columns -->
        <section class="main_bg">
            <section class="section" id="features">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="features-box text-center">
                            <div class="avatar-xl mx-auto mb-4">
                                <div class="avatar-title text-primary h4 m-0 box-shadow rounded-circle">
                                    <img class="mini-icon" src="images/dynamic-website.png" alt="dynamic-website">
                                </div>
                            </div>
                            <h3>1. Активная разработка</h3>

                            <p class="text-muted">Данный проект разрабатывается энтузиастами на бескорстыной основе. Мы стараемся сделать как можно лучше для Вас, игроков.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="features-box text-center">
                            <div class="avatar-xl mx-auto mb-4">
                                <div class="avatar-title text-primary h4 m-0 box-shadow rounded-circle">
                                    <img class="mini-icon" src="images/obratnaya-svyaz.png" alt="feedback">
                                </div>
                            </div>
                            <h3>2. Постоянная обратная связь</h3>

                            <p class="text-muted">Проект не сможет существовать без Вас, поэтому нам очень важна ваша обратная связь.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="features-box text-center">
                            <div class="avatar-xl mx-auto mb-4">
                                <div class="avatar-title text-primary h4 m-0 box-shadow rounded-circle">
                                    <img class="mini-icon" src="images/we-all.png" alt="all">
                                </div>
                            </div>
                            <h3>3. Вместе создадим идеал</h3>

                            <p class="text-muted">Вместе мы создадим лучший сервер, охватывающий как можно больше разных сфер и интересов игроков.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    <!-- Donate -->
        <section class="section " id="pricing">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="title">Донат на сервер и пожертвования</h2>
                        <p class="title-alt">Тут вы можете приобрести внутриигровой донат или напрямую поддержать разработчиков.</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">

                            <!--Donate Game column-->
                            <div class="pricing-column col-lg-6">
                                <div class="card border-0 inner-box p-0 box-shadow">
                                    <div class="card-body text-center">
                                        <div class="plan-header">
                                            <div class="avatar-xl mx-auto mb-4">
                                                <div class="avatar-title text-primary h4 m-0 box-shadow rounded-circle">
<!--                                                    <i class="ri-stack-line"></i>-->
                                                    <img class="mini-icon" src="images/almaz.png" alt="almaz">
                                                </div>
                                            </div>
                                            <h3 class="plan-title">Донат</h3>
                                        </div>
                                        <div>
                                            <h2 class="mt-0">от 20 рублей</h2>
                                        </div>
                                        <div class= "my-4">
                                        	<?php if (Auth\User::isAuthorized()==true): ?>
                                        		<a class="btn btn-sm btn-dark" href="donate.php">Задонатить</a>
                                        		<?php endif; ?>
                                        	<?php if (Auth\User::isAuthorized()==false): ?>
                                            <a class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Сначала нужно зарегистрироватся :-)">Задонатить</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Donate column-->
                            <div class="pricing-column col-lg-6">
                                <div class="card border-0 inner-box p-0 box-shadow">
                                    <div class="card-body text-center">
                                        <div class="plan-header">
                                            <div class="avatar-xl mx-auto mb-4">
                                                <div class="avatar-title text-primary h4 m-0 box-shadow rounded-circle">
<!--                                                    <i class="ri-user-received-line"></i>-->
                                                    <img class="mini-icon" src="images/donate-project.png" alt="donate-project">
                                                </div>
                                            </div>
                                            <h3 class="plan-title">Поддержать</h3>
                                        </div>
                                        <div>
                                            <h2 class="mt-0">50 р.</h2>
                                        </div>
                                        <div class= "my-4">
                                        	<?php if (Auth\User::isAuthorized()==true): ?>
                                            <iframe class="iframe-donate iframe-main" src="https://yoomoney.ru/quickpay/button-widget?targets=%D0%94%D0%BE%D0%BD%D0%B0%D1%82%20%D0%BD%D0%B0%20%D1%81%D0%B5%D1%80%D0%B2%D0%B5%D1%80&default-sum=50&button-text=14&any-card-payment-type=on&button-size=m&button-color=black&mail=on&successURL=https%3A%2F%2Fnever1and.ru&quickpay=small&account=410016470849285&" width="220" height="36" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                                        		<?php endif; ?>
                                        	<?php if (Auth\User::isAuthorized()==false): ?>
                                            	<a class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Сначала нужно зарегистрироватся :-)">Задонатить</a>
                                        	<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </section>
        <!-- Yandex Add -->
        	<!-- Yandex.RTB R-A-672026-2 -->
			<div id="yandex_rtb_R-A-672026-2"></div>
			<script type="text/javascript">
			    (function(w, d, n, s, t) {
			        w[n] = w[n] || [];
			        w[n].push(function() {
			            Ya.Context.AdvManager.render({
			                blockId: "R-A-672026-2",
			                renderTo: "yandex_rtb_R-A-672026-2",
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
			<!-- Yandex Add -->

        </section>


        <div class="position-relative">
            <div class="shape overflow-hidden text-footer">

            </div>
        </div>

        <!-- <div class="position-relative">
            <div class="shape shape-back overflow-hidden text-footer">

            </div>
        </div> -->


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


    <script>

$(function(){
    $('#playersCount').text("0"+"/100");
    refreshPage();
});
function refreshPage(){

    $.ajax({
        url: "Server.php",
        context: $( ".myClass" ),
        success: function(data){

            $('#playersCount').text(data+"/100");
            setTimeout(refreshPage, 5000);
        },
        error: function(){

        },
    });
}

        $(document).ready(function() {
            $('#show_form_signin').click(function () {
                $('#register_form').removeClass('hide');
                $('#login_form').addClass('hide')
                $('#show_form_signin').addClass('disabled')
                $('#show_form_login').removeClass('disabled')
            });
            $('#show_form_login').click(function () {
                $('#login_form').removeClass('hide');
                $('#register_form').addClass('hide')
                $('#show_form_login').addClass('disabled')
                $('#show_form_signin').removeClass('disabled')
            });
            $('.play').click(function () {
            	setTimeout(function () {
            		$('.play').addClass('animate__animated animate__bounce')
            	}, 0)
            	$('.play').removeClass('animate__animated animate__bounce')
            	$('.play').addClass('hide')
            	$('.play-green').removeClass('hide')
            });

        });

        function copytext(el) {
			  var $tmp = $("<input>");
			  $("body").append($tmp);
			  $tmp.val('188.134.84.134:25565').select();
			  document.execCommand("copy");
			  $tmp.remove();
		}

		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})

    </script>
    </body>
</html>
