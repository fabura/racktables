<?php
/**
 * Created by IntelliJ IDEA.
 * User: nikolay.izumov
 * Date: 10.11.12
 * Time: 16:27
 */
class taghistory_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    //todo implement select using conditions
    public function get_taghistory($conditions = array())
    {
        $db = $this->db;
        $db->select("*");
        $db->from("taghistory");
        $db->join("tagtree",('tagtree.id = taghistory.tag_id'), "left");
        $db->join("object",('object.id = taghistory.entity_id'), "left");
        return $db->get()->result();
    }
}