<?php


class Page_Form_Simple_Index_Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BEAR_Test_Client
     */
    public $client;

    public function setUp()
    {
        $this->client =  new BEAR_Test_Client;
        $this->uri = 'http://bear.demo/form/simple/index.php';
    }

    /**
     * OK
     */
    public function testPageSimpleIndexValidSubmit()
    {
        $submit = array('name' => '熊太郎', 'email' => 'kuma@bear-project.net');
        $errors = $this->client->request('POST', $this->uri, $submit)->getFormErrors();
        $this->assertSame(0, count($errors));
    }

    /**
     * No input
     */
    public function testPageSimpleIndexNoInputSubmit()
    {
        $submit = array('name' => '', 'email' => '');
        $errors = $this->client->request('POST', $this->uri, $submit)->getFormErrors();
        $this->assertSame(2, count($errors));
        $expected = '名前を入力してください';
        $this->assertSame($expected, $errors['name']);
        $expected = 'emailを入力してください';
        $this->assertSame($expected, $errors['email']);
    }

    /**
     * Invalid email
     */
    public function testPageSimpleIndexInvalidEmailFormatSubmit()
    {
        $submit = array('name' => '熊太郎', 'email' => 'kuma@@bear-project.net');
        $errors = $this->client->request('POST', $this->uri, $submit)->getFormErrors();
        $this->assertSame(1, count($errors));
        $expected = 'emailの形式で入力してください';
        $this->assertSame($expected, $errors['email']);
    }
}