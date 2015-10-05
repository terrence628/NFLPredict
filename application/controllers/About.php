<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About class
 *
 * @author Dany
 */
class About extends Application {

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->data['pagebody'] = 'about';
        $this->render();
    }
}