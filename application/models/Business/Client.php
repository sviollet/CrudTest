<?php

class Application_Model_Business_Client
{
    /**
     * PRIVATE PROPERTIES
     */
    private $id_;
    public $nom;
    public $prenom;
    public $mail;

    public function __construct(){
        echo __METHOD__;
    }

    public function convertTodbTable() {

        $data = array('nom' => $this->nom,
            'prenom' => $this->prenom,
            'mail' => $this->mail);

        return $data;
    }
}