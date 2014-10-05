<?php

class Application_Form_Client extends Zend_Form
{

    public function init()
    {
        $this->setName('client');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $nom = new Zend_Form_Element_Text('nom');
        $nom->setLabel('Nom')
            ->setRequired(true)
            ->addFilters(array('StringTrim', 'StripTags'))
            ->addValidator('NotEmpty');

        $prenom = new Zend_Form_Element_Text('prenom');
        $prenom->setLabel('Prenom')
            ->setRequired(true)
            ->addFilters(array('StringTrim', 'StripTags'))
            ->addValidator('NotEmpty');

        $mail = new Zend_Form_Element_Text('mail');
        $mail->setLabel('Mail')
            ->setRequired(true)
            ->addFilters(array('StringTrim', 'StripTags'))
            ->addValidator('EmailAddress',  true);

        $submit = new Zend_Form_Element_Submit('submit');
        $this->addElements(array($id, $nom, $prenom, $mail, $submit));
    }


}

