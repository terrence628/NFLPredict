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
            $this->load->library('table');
            
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
            
            
            $dataArray = $this->xmlrpc->display_response();
            echo "<pre>";
            //var_dump($dataArray);
            echo "</pre>";
            $this->table->set_heading('Team', 'Opponent', 'Date','Score');
<<<<<<< HEAD
            
            $parms = array(
                'table_open' => '<table>',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
=======
>>>>>>> 611b900858e3b39b4250a7b82c2892c3ddd1b1c5

            foreach ($dataArray as $data) {
                unset($data['number']);
                $this->table->add_row($data);
            }
            
            //echo $this->table->generate();
            
            $this->data['historytable'] = $this->table->generate();
            
            $this->render();
	}
}