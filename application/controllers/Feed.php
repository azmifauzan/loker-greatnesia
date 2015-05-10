<?php 
class Feed extends CI_Controller {
    public function __construct(){  
        parent::__construct();
        $this->load->helper(array('xml'));
        $this->load->model('feedmodel','fdm');
    }
    public function index()
    {
        // set feed Name will display at title area and page top
        $this->data['feed_name'] = 'Info Lowongan Kerja - Greatnesia.com';
        // set page encoding
        $this->data['encoding'] = 'utf-8';
        // set feed url
        $this->data['feed_url'] = 'http://loker.greatnesia.com/feed';
        // set page language
        $this->data['page_language'] = 'id';
        // set page Description
        $this->data['page_description'] = 'Info Lowongan Kerja dari Greatnesia.com';
        // set author email
        $this->data['creator_email'] = 'azmifauzan@gmail.com';
        $this->data['query'] = $this->fdm->get_feeds(10);
        // this line is very important, this will let browser to display XML format output
        header("Content-Type: application/rss+xml");
        $this->load->view('feed_view',$this->data);
    }
}