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
            $this->data['layout'] = "League";
            $this->data['order'] = "City";
            $this->data['points'] = "Net Point";
            //get all the league from our model
            $pix = $this->League->league();
            
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells[] = $this->parser->parse('_teamcell', (array)$team, true);
            
            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table>',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            
            // finally! generate the table
            $rows = $this->table->make_columns($cells,6);
            $this->data['thetable'] = $this->table->generate($rows);
            $this->data['pagetitle'] = "League Teams";
            
            $this->data['pagebody'] = 'league_team';
            $this->render();
	}
        
        public function Order()
	{
            $layout = $this->input->post('layout');
            $ordering = $this->input->post('order');
            $points = $this->input->post('points');
            $this->data['layout'] = $layout;
            $this->data['order'] = $ordering;
            $this->data['points'] = $points;
            //set the ordering for the database
            switch ($ordering)
            {
                case 'City': $this->session->set_userdata("team_ordering", "city"); break;
                case 'Team': $this->session->set_userdata("team_ordering", "Name"); break;
                case 'Standing': $this->session->set_userdata("team_ordering", "standing"); break;
            }
            //set ordering for points summary for database
            switch ($points)
            {
                case 'Net Point': $this->session->set_userdata("team_point", "net_point"); break;
                case 'Points For': $this->session->set_userdata("team_point", "points_for"); break;
                case 'Points Against': $this->session->set_userdata("team_point", "points_against"); break;
            }
            //select display
            switch ($layout)
            {
                case 'League':  $this->League(); break;
                case 'Conference': $this->Conference(); break;
                case 'Division': $this->Division(); break;
            }
        }
        public function League()
        {
            
            //get all the league from our model
            $pix = $this->League->league();
            
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells[] = $this->parser->parse('_teamcell', (array)$team, true);
            
            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table>',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            
            // finally! generate the table
            $rows = $this->table->make_columns($cells,7);
            $this->data['thetable'] = $this->table->generate($rows);
            $this->data['pagetitle'] = "League Teams";
            
            $this->data['pagebody'] = 'league_team';
            $this->render();
	}
        
        public function Conference()
	{
            //get afc conference from our model
            $pix = $this->League->Conference("AFC");
            
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_afc[] = $this->parser->parse('_teamcell', (array)$team, true);
            
            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table>',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            
            // finally! generate the table
            $rows_afc = $this->table->make_columns($cells_afc,7);
            $this->data['thetable_afc'] = $this->table->generate($rows_afc);
            
            //get nfc conference from table
            $pix2 = $this->League->Conference("NFC");
            
            //build an array of formatted cells for them
            foreach($pix2 as $team)
                $cells_nfc[] = $this->parser->parse('_teamcell', (array)$team, true);
 
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            
            // finally! generate the table
            $rows_nfc = $this->table->make_columns($cells_nfc,7);
            $this->data['thetable_nfc'] = $this->table->generate($rows_nfc);
            $this->data['pagetitle'] = "League Teams - Conference";
            $this->data['pagebody'] = 'league_team_con';
            $this->render();
	}
        
        public function Division()
	{
            //row column for table display
            $row_column = 9;

            // prime the table class
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table>',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            
            //get all the league from our model
            $pix = $this->League->division("ACN");
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_acn[] = $this->parser->parse('_teamcell', (array)$team, true);
            
            $this->table->set_template($parms);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            $rows_acn = $this->table->make_columns($cells_acn,$row_column);
            $this->data['thetable_acn'] = $this->table->generate($rows_acn);
            
            
            $pix = $this->League->division("ACE");          
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_ace[] = $this->parser->parse('_teamcell', (array)$team, true);
            $this->table->set_template($parms);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            $rows_ace = $this->table->make_columns($cells_ace,$row_column);
            $this->data['thetable_ace'] = $this->table->generate($rows_ace);
            
            
            $pix = $this->League->division("ACS");          
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_acs[] = $this->parser->parse('_teamcell', (array)$team, true);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            $rows_acs = $this->table->make_columns($cells_acs,$row_column);
            $this->data['thetable_acs'] = $this->table->generate($rows_acs);
            
            
            $pix = $this->League->division("ACW");
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_acw[] = $this->parser->parse('_teamcell', (array)$team, true);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            $rows_acw = $this->table->make_columns($cells_acw,$row_column);
            $this->data['thetable_acw'] = $this->table->generate($rows_acw);
            
            
            $pix = $this->League->division("NCN");
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_ncn[] = $this->parser->parse('_teamcell', (array)$team, true);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            $rows_ncn = $this->table->make_columns($cells_ncn,$row_column);
            $this->data['thetable_ncn'] = $this->table->generate($rows_ncn);
                      
            
            $pix = $this->League->division("NCE");
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_nce[] = $this->parser->parse('_teamcell', (array)$team, true);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            $rows_nce = $this->table->make_columns($cells_nce,$row_column);
            $this->data['thetable_nce'] = $this->table->generate($rows_nce);
                   
            
            $pix = $this->League->division("NCS");
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_ncs[] = $this->parser->parse('_teamcell', (array)$team, true);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            $rows_ncs = $this->table->make_columns($cells_ncs,$row_column);
            $this->data['thetable_ncs'] = $this->table->generate($rows_ncs);
            
            
            $pix = $this->League->division("NCW");
            //build an array of formatted cells for them
            foreach($pix as $team)
                $cells_ncw[] = $this->parser->parse('_teamcell', (array)$team, true);
            $this->table->set_heading('Logo','Name', 'Team code', 'Conference', 'Division', 'City');
            $rows_ncw = $this->table->make_columns($cells_ncw,$row_column);
            $this->data['thetable_ncw'] = $this->table->generate($rows_ncw);

            $this->data['pagetitle'] = "League Teams - Division";
            
            $this->data['pagebody'] = 'league_team_div';
            $this->render();
	}
}