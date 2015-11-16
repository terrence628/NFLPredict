    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {

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
            $action = $this->input->post('button');
    // Decide what to do
            switch ($action)
            {
                case 'Save': $this->Save(); break;
                case 'Delete': $this->Delete(); break;
                case 'Cancel': $this->Cancel(); break;
            }
  
        }
        
        function Save(){
            $id = $this->input->post('ID');
            $data = array
            (
                'Name' => $this->input->post('Name'),
                'mug' => $this->input->post('Mug'),
                'player_number' => $this->input->post('Player_Number'),
                'Pos' => $this->input->post('Pos'),
                'Status' => $this->input->post('Status'),
                'Height' => $this->input->post('Height'),
                'Weight' => $this->input->post('Weight'),
                'Birthdate' => $this->input->post('Birthdate'),
                'Exp' => $this->input->post('Exp'),
                'College' => $this->input->post('College')
            );
            $this->Team->update_player($id,$data);

        }
        
        function Delete(){
            $id = $this->input->post('ID');
            $this->Team->delete_player($id);

        }
        
        function Cancel(){
           
            
        }
             
         
}
