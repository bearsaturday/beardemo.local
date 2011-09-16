<?php


class Page_Db_Select_Item extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BEAR_Test_Client
     */
    public $client;

    public function setUp()
    {
        $this->client =  new BEAR_Test_Client;
        $this->uri = 'http://bear.demo/db/select/item.php';
    }

    /**
     * ?id=1
     */
    public function testId1()
    {
        $log = $this->client->request('GET', $this->uri . '?id=1')->getResourceRequestLog();
        $expected = 1;
        $this->assertSame($expected, count($log));
        $this->assertSame('read Entry?id=1', $log[0]);
    }

    }