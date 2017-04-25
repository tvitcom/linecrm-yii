<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class OverallSearchForm extends CFormModel
{
    public $search_string;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            // name, email, subject and body are required
            array('search_string', 'required'),
            array('search_string', 'length', 'encoding' => 'utf-8', 'min' => 3, 'max' => 30),
            array('search_string', 'filter', 'filter' => 'addslashes'),
            array('search_string', 'filter', 'filter' => array($obj = new CHtmlPurifier(), 'purify')),
        );
    }
}
