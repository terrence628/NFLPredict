<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Welcome class
 *
 * @author Dany
 */
class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
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

            $this->data['pagebody'] = 'welcome';
            $this->render();
        }
}
