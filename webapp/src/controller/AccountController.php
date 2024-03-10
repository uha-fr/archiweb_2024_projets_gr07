<?php
use webapp\view\AccountView;
use webapp\model\AccountModel;

final class AccountController {
    function getuser() {
        $accountModel = new AccountModel();
        $user_id = $accountModel->getUserIdFromSession();
        if ($user_id) {
            $user = AccountModel::getByID($user_id);
            $v = new AccountView();
            $html = $v->showUserInformation($user);
            echo $html;
            http_response_code(200);
        } else {
            header("Location: login");
            exit;
        }
    }

    function signup() {
        $v = new AccountView();
        $html = $v->signup();
        echo $html;
        http_response_code(200);
    }

    function login() {
        $v = new AccountView();
        $html = $v->login();
        echo $html;
        http_response_code(200);
    }
    function logout() {
        AccountModel::logout();
        header("location: login/guest");

    }

    function loginSubmit($post) {
        $m = new AccountModel();
        $user = $m->submitLogin($post);
        $v = new AccountView();
        $html = $v->showUserInformation($user);
        echo $html;
        http_response_code(200);
    }

    function signupSubmit($post) {
        $m = new AccountModel();
        $user = $m->submitSignup($post);
        $v = new AccountView();
        $html = $v->showUserInformation($user);
        echo $html;
        http_response_code(200);
    }

    function view($url) {
        if (isset($url['action'])) {
            switch ($url['action']) {
                case 'account':
                    $this->getuser();
                    break;
                case 'signup':
                    $this->signup();
                    break;
                case 'login':
                    $this->login();
                    break;
                case 'logout':
                    $this->logout();
                    break;
                case 'loginsubmit':
                    $this->loginSubmit($url['post']);
                    break;
                case 'signupsubmit':
                    $this->signupSubmit($url['post']);
                    break;
                default:
                    break;
            }
        }
    }
}
?>
