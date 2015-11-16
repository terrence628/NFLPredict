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

        function index()
	{
            $pix = $this->Team->roster();
            $action = $this->input->post('order');
            $type = $this->input->post('type');
    // Decide what to do
            switch ($action)
            {
                case 'Name': $this->session->set_userdata("ordering", "name"); break;
                case 'Jersey': $this->session->set_userdata("ordering", "player_number"); break;
                case 'Position': $this->session->set_userdata("ordering", "Pos"); break;
            }
            
            switch ($type)
            {
                case 'Table': break;
                case 'Gallery': redirect('/roster/gallery', 'refresh'); return;
            }
            
            $this->load->library('pagination');
            $this->load->library('table');
            $this->load->model("paging");
            
            $config = array();
            $config['base_url'] = "/roster";
            $config['total_rows'] = $this->db->count_all('roster');
            $config['per_page'] = 12; 
            $config['num_links'] = 1;
            $config['$display_prev_link'] = TRUE;
            $config['$display_prev_link'] = TRUE;
            $config['display_pages'] = TRUE;
            $config['use_page_numbers'] = TRUE;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            
            $this->pagination->initialize($config);
            
            $offset = $this->uri->segment(2) ? ($this->uri->segment(2) - 1) * $config['per_page'] : 0;
            $pix = $this->paging->page_records($config['per_page'] * ($this->uri->segment(2) ? ($this->uri->segment(2) - 1) : 1), $offset);
            
            foreach($pix as $picture)
                $cells[] = $this->parser->parse('_rostercell', $picture, true);
            
            $this->load->library('table');
            // prime the table class
            $parms = array(
                'table_open' => '<table>',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            $this->table->set_heading('Jersey No', 'Name', 'Pos', 'Status', 'Height', 'Weight', 'Birthdate', 'Exp', 'College');

            // finally! generate the table
            $rows = $this->table->make_columns($cells, 10);
            $this->data['thetable'] = $this->table->generate($rows);

            $this->data['pagetitle'] = "Team Roster - Table";
            $this->data['pagination_links'] = $this->pagination->create_links();

            $this->data['pagebody'] = 'roster';

            $this->render();
	}
        function gallery(){
            	
            //$this->load->view('welcome');
            
             // get the team roster from our model
            $pix = $this->Team->roster();
            $action = $this->input->post('order');
    // Decide what to do
            
            $this->load->library('pagination');
            $this->load->library('table');
            $this->load->model("paging");
            
            $this->load->library('pagination');
            $this->load->library('table');
            $this->load->model("paging");
            
            $config = array();
            $config['base_url'] = "/roster/gallery";
            $config['total_rows'] = $this->db->count_all('roster');
            $config['per_page'] = 12; 
            $config['num_links'] = 1;
            $config['$display_prev_link'] = TRUE;
            $config['$display_prev_link'] = TRUE;
            $config['display_pages'] = TRUE;
            $config['use_page_numbers'] = TRUE;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            
            $this->pagination->initialize($config);
            
            $offset = $this->uri->segment(3) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
            
            
            switch ($action)
            {
                case 'Name': $this->session->set_userdata("ordering", "name"); break;
                case 'Jersey': $this->session->set_userdata("ordering", "player_number"); break;
                case 'Position': $this->session->set_userdata("ordering", "Pos"); break;
            }
            
            $pix = $this->paging->page_records($config['per_page'] * ($this->uri->segment(3) ? ($this->uri->segment(3) - 1) : 1), $offset);
            // build an array of formatted cells for them
            foreach($pix as $picture)
                $cells[] = $this->parser->parse('_gallerycell', (array)$picture, true);
            
            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table>',
            
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            //$this->table->set_heading('Jersey No','Mugshot', 'Name', 'Pos', 'Status', 'Height', 'Weight', 'Birthdate', 'Exp', 'College');
            
            // finally! generate the table
            $rows = $this->table->make_columns($cells, 3);
            $this->data['thetable'] = $this->table->generate($rows);
            $this->data['pagetitle'] = "Team Roster - Gallery";
            
            $this->data['pagebody'] = 'roster_gallery';
            $this->data['pagination_links'] = $this->pagination->create_links();
            
            $this->render();
	
        }
        function player_info($num){
   
             $pix = $this->Team->get($num);
            
            // build an array of formatted cells for them
            foreach($pix as $picture)
                $cells[] = $this->parser->parse('_justone', (array)$picture, true);
            
            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table>',
            
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
           // $this->table->set_heading('Jersey No','Mugshot', 'Name', 'Pos', 'Status', 'Height', 'Weight', 'Birthday', 'Exp', 'College');
            
            // finally! generate the table
            $rows = $this->table->make_columns($cells, 1);
            $this->data['thetable'] = $this->table->generate($rows);
            $this->data['pagetitle'] = "Team Roster - Player Detail";
            
            $this->data['pagebody'] = 'edit'; 
            $this->render();
	
         }
         
         function order() {
             
             
         }
}
