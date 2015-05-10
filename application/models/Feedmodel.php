<?php
class Feedmodel extends CI_Model
{
    // get all
    function get_feeds($lim)
    {
        $this->db->where('status',1);
        $this->db->order_by('upload_time','desc');
        $this->db->limit($lim);
        return $this->db->get('lowongan');
    }
}