<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class ExampleController extends CrudController {

    public function __construct($parameters) {
        parent::__construct($parameters);
        $this->setHeadTitle('Example');
        $this->objDAO = new example();
    }

}
