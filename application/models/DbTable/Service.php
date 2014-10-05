<?php

abstract class Application_Model_DbTable_Service extends Zend_Db_Table_Abstract implements Application_Model_ICrudService {

    protected $_name;

    public function init() {

        $this->_name = null;
        $this->_getTableName();
    }

    protected function _getTableName() {

        if (!$this->_name) {
            $cls = get_class($this);
            $this->_name = strtolower(substr(strrchr($cls, '_'), 1, strlen(strrchr($cls, '_'))) . 's');
        }
    }
}