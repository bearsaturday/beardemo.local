<?php

class Ro_User_Entry_Test extends \PHPUnit_Framework_TestCase
{
    /**
     * for MDB2
     *
     * @var bool
     */
    protected $backupGlobals = FALSE;

    /**
     * @var BEAR_Resource
     */
    public $resource;

    public function setUp()
    {
        $config = array('path' => __DIR__ . 'App/Ro');
        $this->resource =  new BEAR_Resource($config);
        $this->uri = 'Entry';
    }

    /**
     * ?id=1
     */
    public function testId1()
    {
        $values = array('id' => 1);
        $ro = $this->resource->read(array('uri' => $this->uri, 'values' => $values))->getRo();
        $this->assertSame(200, $ro->getCode());
        $body = $ro->getBody();
        $expected = "PHP";
        $this->assertSame($expected, $body['title']);
        $expected = "PHP: Hypertext Preprocessor（ピー・エイチ・ピー ハイパーテキスト プリプロセッサー）とは、動的にHTMLデータを生成することによって、動的なウェブページを実現することを主な目的としたプログラミング言語、およびその言語処理系である。";
        $this->assertSame($expected, $body['body']);
    }

    /**
     * ?id=2
     */
    public function testId2()
    {
        $values = array('id' => 2);
        $ro = $this->resource->read(array('uri' => $this->uri, 'values' => $values))->getRo();
        $this->assertSame(200, $ro->getCode());
        $body = $ro->getBody();
        $expected = "Java";
        $this->assertSame($expected, $body['title']);
    }
}