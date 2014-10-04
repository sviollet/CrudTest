<?php
require_once 'Actions.php';

class ClientController extends Application_Controller_Actions
{

    public function init()
    {
        parent::init();
    }

    public function indexAction()
    {
        $this->view->clients = $this->_table->fetchAll();
    }

    public function addAction()
    {
        $form = new Application_Form_Client();

        $form->submit->setLabel('Add');
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $this->_table->addAction($this->getValuesFromForm($form));

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {
        $form = new Application_Form_Client();

        $form->submit->setLabel('Edit');
        $this->view->form = $form;

        $id = $this->_getParam('id', 0);

        if ($this->getRequest()->isPost()) {

            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $this->_table->updateAction($id, $this->getValuesFromForm($form));

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            if ($id > 0) {
                $form->populate($this->_table->getAction($id));
            }
        }
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->_getParam('id', 0);
                $this->_table->deleteAction($id);
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $this->view->album = $this->_table->getAction($id);
        }
    }

    private function getValuesFromForm($form) {

        $clientTemp = new Application_Model_Business_Client();
        $clientTemp->nom = $form->getValue('nom');
        $clientTemp->prenom = $form->getValue('prenom');
        $clientTemp->mail = $form->getValue('mail');

        return $clientTemp;
    }
}







