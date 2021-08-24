<?php

include './classes/Auth.class.php';
include './classes/AjaxRequest.class.php';

if (!empty($_COOKIE['sid'])) {
    // check session id in cookies
    session_id($_COOKIE['sid']);
}
session_start();

class AuthorizationAjaxRequest extends AjaxRequest
{
    public $actions = array(
        "login" => "login",
        "logout" => "logout",
        "register" => "register",
        "feedback"=>"feedback"
    );

    public function feedback()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }
        setcookie("sid", "");

        $email = $this->getRequestParam("email");
        $feedback = $this->getRequestParam("feedback");
        

        if (empty($email)) {
            $this->setFieldError("email", "Введите email");
            return;
        }

        if (empty($feedback)) {
            $this->setFieldError("feedback", "Введите ваш отзыв");
            return;
        }

        $user = new Auth\User();
        $user->createFeedback($email, $feedback);


        
        $this->setResponse("redirect", ".");
        $this->status = "ok";
        $this->message = sprintf("Ваше мнение очень важно для нас :), %s!", $email);
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }
        setcookie("sid", "");

        $username = $this->getRequestParam("username");
        $password = $this->getRequestParam("password");
        $remember = !!$this->getRequestParam("remember-me");

        if (empty($username)) {
            $this->setFieldError("username", "Введите login");
            return;
        }

        if (empty($password)) {
            $this->setFieldError("password", "Введите пароль");

            return;
        }
 
        $user = new Auth\User();
        $auth_result = $user->authorize($username, $password, $remember);

        if (!$auth_result) {
            $this->setFieldError("password", "Неправильный Login или пароль");
            return;
        }

        $this->status = "ok";
        $this->setResponse("redirect", ".");
        $this->message = sprintf("Приветствуем, %s!", $username);
    }

    public function logout()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("sid", "");

        $user = new Auth\User();
        $user->logout();

        $this->setResponse("redirect", ".");
        $this->status = "ok";
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            // Method Not Allowed
            http_response_code(405);
            header("Allow: POST");
            $this->setFieldError("main", "Method Not Allowed");
            return;
        }

        setcookie("sid", "");

        $username = $this->getRequestParam("username");
        $password1 = $this->getRequestParam("password1");
        $password2 = $this->getRequestParam("password2");

        if (empty($username)) {
            $this->setFieldError("username", "Введите login");
            return;
        }

        if(strlen($username) < 5 || strlen($username)>20 ) {
            $this->setFieldError("username", "В Login должно быть не меньше 5 символов и не больше 20");
            return;
        }

        if (empty($password1)) {
            $this->setFieldError("password1", "Введите пароль");
            return;
        }
        $uppercase = preg_match('@[A-Z]@', $password1);
        $lowercase = preg_match('@[a-z]@', $password1);
        $number    = preg_match('@[0-9]@', $password1);

        if(!$uppercase || !$lowercase || !$number || strlen($password1) < 8) {
            $this->setFieldError("password1", "Придумай норм пароль епта");
            return;
        }
           

        if (empty($password2)) {
            $this->setFieldError("password2", "Подтвердите пароль");
            return;
        }

        if ($password1 !== $password2) {
            $this->setFieldError("password2", "Пароли не совпадают");
            return;
        }

        $user = new Auth\User();

        try {
            $new_user_id = $user->create($username, $password1);
        } catch (\Exception $e) {
            $this->setFieldError("username", $e->getMessage());
            return;
        }
        $user->authorize($username, $password1);

        $this->message = sprintf("Здравстуйте, %s! Спасибо что вы с нами.", $username);
        $this->setResponse("redirect", "/");
        $this->status = "ok";
    }
}

$ajaxRequest = new AuthorizationAjaxRequest($_REQUEST);
$ajaxRequest->showResponse();
