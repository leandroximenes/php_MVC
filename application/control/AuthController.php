<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class AuthController extends CrudController {

    public function login() {
        $a = 10;
        if (isset($_POST['email'])) {
            $_SESSION[APP_NAME]['logado'] = true;
            echo json_encode(array(
                'valid' => 'true'
            ));
        }
        return;
    }

    public function logout() {
        session_unset();
        redirect(true);
    }

}
