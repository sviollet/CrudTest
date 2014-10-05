<?php

class Application_Model_DbTable_Client extends Application_Model_DbTable_Service{

    protected $_name = 'clients';

    public function getAction($id){
        $id = (int)$id;
        $row = $this->fetchRow('id ='.$id);

        if (!$row){
            throw new Exception("Could not find client with this id ($id)");
        }

        return $row->toArray();
    }

    public function addAction($bobject){

        if (is_a($bobject, Application_Model_Business_Client)) {
/*
            $validator = new Zend_Validate_Db_RecordExists(
                array(
                    'table' => $this->_name,
                    'field' => 'mail'
                )
            );
*/
            //if (!$validator->isValid($bobject->mail)) {
                $data = $bobject->convertTodbTable();
                $this->insert($data);
            //} else {
                //message d'erreur
            //}
        }
    }

    public function updateAction($id, $bobject){

        if (is_a($bobject, Application_Model_Business_Client)) {

            $data = $bobject->convertTodbTable();
            $this->update($data, 'id ='.(int)$id);
        }
    }

    public function deleteAction($id) {
        $this->delete('id = '.(int)$id);
    }
}