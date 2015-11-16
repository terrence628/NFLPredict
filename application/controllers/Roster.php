<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roster extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($page = 0)
	{
            $this->load->library('pagination');
            $this->load->library('table');
            
            $config = array();
            $config['base_url'] = "/roster";
            $config['total_rows'] = $this->db->count_all('roster');
            $config['per_page'] = 12; 
            $config['num_links'] = 3;
            //$config['uri_segment'] = 3;

            $this->pagination->initialize($config);
         
            $pix = $this->db->get('roster', $config['per_page'], $page * $config['per_page'])->result_array();
            //$pix = $this->db->get('roster', $config['per_page'], $this->uri->segment(3,0))->result_array();
            // build an array of formatted cells for them
            foreach($pix as $picture)
                $cells[] = $this->parser->parse('_rostercell', $picture, true);
            
            // prime the table class
            $parms = array(
                'table_open' => '<table>',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);

            $this->table->set_heading('Jersey No','Mugshot', 'Name', 'Pos', 'Status', 'Height', 'Weight', 'Birthdate', 'Exp', 'College');
            
            // finally! generate the table
            $rows = $this->table->make_columns($cells, 12);
            $this->data['thetable'] = $this->table->generate($rows);
            $this->data['pagetitle'] = "Team Roster";
            $this->data['pagebody'] = 'roster';
            
            $this->data['pagination_links'] = $this->pagination->create_links();
            
            $this->render();
	}
}
