<?php

abstract class Application_Controller_Actions extends Zend_Controller_Action
{
    /**
     * @var Application_Model_DbTable_IDbTable
     */
    protected $_table;
    protected $_tableClass;

    public function init()
    {
        $this->_getTable();
    }

    protected function _getTableClass()
    {
        if (!$this->_tableClass) {
            // Récupère le nom de la classe du contrôleur
            $cls = get_class($this);
            // Supprime le suffixe Controller
            $this->_tableClass = substr($cls, 0, strlen($cls) - 10);
            // Passe de la notation UpperCamelCase à une notation ou les mots sont
            // séparés par des blancs soulignés
            $this->_tableClass = preg_replace('/([a-z])([A-Z])/', '$1_$2', $this->_tableClass);
            // Récupère le nom du module et mets en majuscule la première lettre
            //$module = ucfirst($this->_getParam('module'));
            $module = 'Application';

            // Assemble les différents éléments pour obtenir le nom de la classe du modèle
            $this->_tableClass = $module . '_Model_DbTable_' . $this->_tableClass;
        }
        return $this->_tableClass;
    }

    protected function _getTable()
    {
        if (!$this->_table) {
            $tableClass = $this->_getTableClass();
            $this->_table = new $tableClass;
        }
        return $this->_table;
    }

    abstract public function indexAction();
    abstract public function addAction();
    abstract public function editAction();
    abstract public function deleteAction();

}

