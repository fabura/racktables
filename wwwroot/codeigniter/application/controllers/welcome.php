<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $result = array();
        if (is_array($_GET) && count($_GET)) {
            $sn = isset($_GET['sn']) ? $_GET['sn'] : "";
            $pn = isset($_GET['pn']) ? $_GET['pn'] : "";
//            $result = $sn. " " . $pn;
            $result = $_GET;
            var_dump($_GET);
            $this->load->helper("HPWarrancyTime");
            $result = HPWarrancyTime::getWarranty($sn, $pn);
        }

        $this->load->view('welcome_message', array('result' => $result));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */