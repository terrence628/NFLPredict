    <?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends Application {


	/**
	 * Index Page for this controller.
	 */
	public function index()
	{

            $this->data['pagetitle'] = "Home";
            $this->data['pagebody'] = 'welcome';

            $this->data['pagetitle'] = "NFL Predict";
            
            $this->data['pagebody'] = 'home';
            $this->render();
        }
}
