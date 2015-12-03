<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * History class
 *
 * @author Dany
 */
class History extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
            $this->data['pagebody'] = 'history';
            $this->data['pagetitle'] = "History Page";
            
            $url = "nfl.jlparry.com/rpc";
            $this->load->library('xmlrpc');
            $this->xmlrpc->server($url, 80);
            $this->xmlrpc->method('since');
            $request = array('20150830');
            $this->xmlrpc->request($request);
            if ( ! $this->xmlrpc->send_request())
            {
                echo "Error: " . $this->xmlrpc->display_error();
            }
            print_r($this->xmlrpc->display_response());
            
            $this->render();
	}
}