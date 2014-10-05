<?php

interface Application_Model_ICrudService {

    public function getAction($id);
    public function addAction($bobject);
    public function updateAction($id, $bobject);
    public function deleteAction($id);

}