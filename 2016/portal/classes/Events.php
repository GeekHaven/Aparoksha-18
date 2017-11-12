<?php
/*
Created by Saptak
*/

class Events {
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $isLoggedIn;

    public function __construct($event = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('sessions/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');
    } 

    public function create($fields = array()) {
        if(!$this->_db->insert('portal_registrations', $fields)) {
            throw new Exception('Sorry, there was a problem creating your account;');
        }
    }   

    public function find($event = null) {
        if($event) {
            $data = $this->_db->get('portal_events', array('id', '=', $event));

            if($data->count()) {
                $this->_data = $data->first();
                return $this->_data;
            }
        }
    }

    public function findAll() {
        $data = $this->_db->get('portal_events', array('1', '=', '1'));

        if($data->count()) {
            $this->_data = $data->results();
            return $this->_data;
        }
    }
    
    public function data() {
        return $this->_data;
    }
}