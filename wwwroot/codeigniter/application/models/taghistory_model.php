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

    public function get_taghistory($conditions = array())
    {
        if(is_null($conditions['tag']) || is_null($conditions['object']) || $conditions['dateFrom'] > $conditions['dateTo'])
            return null;
        $db = $this->db;
        $db->select("*");
        $db->from("TagHistory");

        $db->where_in('TagHistory.tag_id', $conditions['tag']);
        $db->where_in('TagHistory.entity_id', $conditions['object']);

        $db->where('TagHistory.date >=', $conditions['dateFrom']);
        $db->where('TagHistory.date <=', $conditions['dateTo']);

        $db->join("TagTree",('TagTree.id = TagHistory.tag_id'), "left");
        $db->join("Object",('Object.id = TagHistory.entity_id'), "left");
        return $db->get()->result();
    }
}