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
        if(is_null($conditions['tag']) || is_null($conditions['object']) || $conditions['dateFrom'] > $conditions['dateTo'])
            return null;
        $db = $this->db;
        $db->select("*");
        $db->from("taghistory");

        $db->where_in('taghistory.tag_id', $conditions['tag']);
        $db->where_in('taghistory.entity_id', $conditions['object']);

        $db->where('taghistory.date >=', $conditions['dateFrom']);
        $db->where('taghistory.date <=', $conditions['dateTo']);

        $db->join("tagtree",('tagtree.id = taghistory.tag_id'), "left");
        $db->join("object",('object.id = taghistory.entity_id'), "left");
        return $db->get()->result();
    }
}