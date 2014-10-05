<?php

abstract class Application_Model_DbTable_Service extends Zend_Db_Table_Abstract implements Application_Model_ICrudService {

    abstract public function getAction($id);
    abstract public function addAction($bobject);
    abstract public function updateAction($id, $bobject);
    abstract public function deleteAction($id);
}