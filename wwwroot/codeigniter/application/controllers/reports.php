<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Reports extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('taghistory_model');
        $this->load->model('objects_model');
    }
    public function taghistory()
    {
        global $pageno, $tabno;
        /*
        $header_data = array('tab'=>$tab['reports'], 'pageno'=>$pageno, 'tabno'=>$tabno);
        $this->load->view('header_view', $header_data);

        $data = array('db'=> 'Передали массив данных из контроллера в представление');
        $this->load->view('taghistory_view', $header_data);

        $this->load->view('footer_view');*/
        if(!file_exists('application/views/pages/taghistory.php'))
        {
            show_404();
        }
        $data['title'] = "taghistory";
        $conditions = array();
        $data['taghistory'] = $this->taghistory_model->get_taghistory($conditions);
        $data['objects'] = $this->objects_model->get_objects();
        $data['mountinfo'] = getMountInfo(array_map(function($elem){return $elem->id;}, $data["objects"]));
        $data['pageno'] = $pageno;
        $data['tabno'] = $tabno;

        $this->load->view('templates/header.php', $data);
        $this->load->view('pages/taghistory.php', $data);
        $this->load->view('templates/footer.php', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */