<?php


class Page_Form_Multi_Index_Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BEAR_Test_Client
     */
    public $client;

    /**
     *
     */
    public function setUp()
    {
        $this->client =  new BEAR_Test_Client;
        $this->uri = 'http://bear.demo/form/multi/index.php';
    }

    /**
     * Login OK
     */
    public function testPageSimpleIndexValidLoginSubmit()
    {
        $submit = array('id' => 'kuma', 'password' => 'kuma777');
        $isValidSubmit = $this->client->request('POST', $this->uri, $submit, 'login')->isValidSubmit();
        $this->assertTrue($isValidSubmit);
    }

    /**
     * Reminder OK
     */
    public function testPageSimpleIndexValidReminderSubmit()
    {
        $submit = array('email' => 'kuma@example.com');
        $isValidSubmit = $this->client->request('POST', $this->uri, $submit, 'reminder')->isValidSubmit();
        $this->assertTrue($isValidSubmit);
    }
}