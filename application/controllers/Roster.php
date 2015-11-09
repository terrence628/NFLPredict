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
	public function index()
	{
            //$this->load->view('welcome');
            
             // get the team roster from our model
            $pix = $this->Team->roster();
            
            // build an array of formatted cells for them
            foreach($pix as $picture)
                $cells[] = $this->parser->parse('_rostercell', (array)$picture, true);
            
            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table>',
                
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            $this->table->set_heading('No', 'Name', 'Pos', 'Status', 'Height', 'Weight', 'Birthdate', 'Exp', 'College');
            
            // finally! generate the table
            $rows = $this->table->make_columns($cells, 12);
            $this->data['thetable'] = $this->table->generate($rows);
            $this->data['pagetitle'] = "Team Roster";
            
            $this->data['pagebody'] = 'roster';
            $this->render();
	}
}
