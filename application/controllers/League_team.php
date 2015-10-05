<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * League Team class
 *
 * @author Dany
 */
class League_team extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
            //get all the league from our model
            $pix = $this->League->league();
            
            //build an array of formatted cells for them
            foreach($pix as $picture)
                $cells[] = $this->parser->parse('_teamcell', (array)$picture, true);
            
            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table>',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            $this->table->set_heading('Name', 'G', 'Pts/G', 'TotPts', 'Scrm Plys', 'Yds/G', 'Yds/P', '1st/G');
            
            // finally! generate the table
            $rows = $this->table->make_columns($cells, 12);
            $this->data['thetable'] = $this->table->generate($rows);
            $this->data['pagetitle'] = "League Teams";
            
            $this->data['pagebody'] = 'league_team';
            $this->render();
	}
}