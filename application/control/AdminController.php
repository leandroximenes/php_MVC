<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class AdminController extends CrudController {

    public function notFound() {
        $this->page = '404';
        return new ViewModel($this);
    }

}
