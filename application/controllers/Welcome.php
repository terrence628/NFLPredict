    <?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends Application {


	/**
	 * Index Page for this controller.
	 */
	public function index()
	{

            $team = $this->League->dropdown();
            

            $this->load->library('table');
             foreach($team as $data)
                $cells[] = $this->parser->parse('_dropdown', (array)$data, true);
            $rows = $this->table->make_columns($cells,7);
            $this->data['dropdown'] =$this->table->generate($rows); 
            
            $this->data['pagetitle'] = "Home";
            $this->data['pagebody'] = 'welcome';

            $this->data['pagetitle'] = "NFL Predict";
            
            $this->data['pagebody'] = 'home';
            $this->render();
        }
        public function testing()
	{
            $abc=$this->input->post('code');
            //$abc ="hi";
            echo $abc;
        }
}
