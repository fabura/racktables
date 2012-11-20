<?php
/**
 * objects_model.php
 * Created by JetBrains PhpStorm.
 * User: bulat.fattahov
 * Date: 15.11.12
 * Time: 16:18
 */
class objects_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_objects()
    {
        /**
         * @var CI_DB_mysql_driver
         */
        $db = $this->db;
        $db->select("*");
        $db->from("object");
//        $db->join("AttributeMap",('object.objtype_id = AttributeMap.objtype_id'), "left");
        return $db->get()->result();
    }


}
