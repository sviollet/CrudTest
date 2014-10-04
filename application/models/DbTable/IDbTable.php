<?php

interface Application_Model_DbTable_IDbTable {

    public function getAction($id);
    public function addAction($bobject);
    public function updateAction($id, $bobject);
    public function deleteAction($id);

}