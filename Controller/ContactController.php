<?php
	
namespace Blog\Controller;

use Blog\Model\ContactModel;

class ContactController
{
    protected $view;
    private $db;
    private $validData = array();
    private $errors = array();
    private $labels = array("name" => "Name", "email" => "E-Mail-Adresse",  "content" => "Nachricht");	
    
    
    public function __construct($view) 
    {
        $this->db = new ContactModel();
        $this->view = $view;
    }
     
    public function showContactForm()
    {
        $this->view->setVars([
            'labels' => $this->labels,
            'validData' => $this->validData,
            'errors' => $this->errors
        ]);
    }

    public function showConfirmation()
    {
        
    }

    public function validateForm(){
        foreach ($this->labels as $index => $value) {
            if (!isset($_POST[$index]) || empty($_POST[$index])) {
                $this->errors[$index] = "Bitte " . $value . " angeben";
            } else {
                $this->validData[$index] = $_POST[$index];
            }       
        }

        if (count($this->errors) > 0) {
            $this->view->setDoMethodName("showContactForm");
            $this->showContactForm();
        } else {
            if ($this->db->writeContactData($this->validData)) {
                $this->view->setDoMethodName("showConfirmation");
                $this->showConfirmation();
            }
        }
    }
}
?>