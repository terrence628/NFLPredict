<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Controller.php
 *
 * Default application controller
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content

   
    protected $choices = array(     //our meun navbar
        'Home' => '/', 'Team' =>'/team', '/', 'League' => '/league_team', 'About' => '/about'
    );

    /**
     * Constructor.
     * Establish view parameters & set a couple up
     */
    function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'BCIT Colts';
    }

    /**
     * Render this page
     */
    function render()
    {
        $this->data['menubar'] =build_menu_bar($this->choices);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }
}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
