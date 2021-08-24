<?php

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}

session_start();
require_once 'classes/Auth.class.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
	<nav class="navbar navbar-expand-lg navbar-default navbar-dark navbar-custom navbar-custom-dark" style="background: url('../images/Neverland-header.jpg');">
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

    <section class="mb-50">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-2 br-15">
    				<div class="user-avatar">
                        <img class="mini-icon" src="images/2.png" alt="dynamic-website">
                    </div>
                    <div style="text-align: center;">
                    	<a class="" style="font-size: 30px; color: white;"><?php echo $_SESSION["user_id"];?></a>
                    </div>
                    <ul class="rounded">
					  <li><a href="#">Достижения</a></li>
					  <li><a href="#">Общие данные</a></li>
					  <li><a href="#">Активные сервера</a></li>
					</ul>
    			</div>
    			<div class="col-lg-1">

    			</div>
    			<div class="col-lg-9 br-15">
    				<div class="col-lg-12 achievment-container">
    					<div class="achievment-name">Бегунок</div>
    					<div class="achievment-about">Пробежать 1000км</div>
    					<div class="progress">
						  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>





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
</body>
</html>