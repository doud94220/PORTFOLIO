<?php

namespace Entity;

class Task
{
    //Attributs en public sinon le code JS ne les lit pas
    public $id;
    public $user_id;
    public $title;
    public $description;
    public $creation_date;
    public $status;
    
    //GETTERS
    public function getId() {
        return $this->id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCreation_date() {
        return $this->creation_date;
    }

    public function getStatus() {
        return $this->status;
    }

    //SETTERS
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setCreation_date($creation_date) {
        $this->creation_date = $creation_date;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }
}
