<?php
/**
 * Created by IntelliJ IDEA.
 * User: nikolay.izumov
 * Date: 10.11.12
 * Time: 16:27
 * To change this template use File | Settings | File Templates.
 */
class taghistory_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_taghistory()
    {
            $query = $this->db->get('taghistory');
            return $query->result_array();
    }
}