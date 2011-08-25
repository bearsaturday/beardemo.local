<?php
// set_include_path('/Users/akihito/www/bear.demo' . PATH_SEPARATOR . get_include_path());<?php
class PageTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $_SERVER['bearmode'] = 1;
        require_once 'App.php';
        $cancelHandler = false;

        //BEAR_Main::includePage('db/select/item.php'); //pageクラスがhtdocs/以下にないとき
        //内部でエラーがでるとき
        if ($cancelHandler) {
            restore_exception_handler();
            restore_error_handler();
            error_reporting(E_ALL);
        }
    }

    /**
     * page://db/select/item
     *
     */
    public function testPageDbSelectItemPhp()
    {
        // resource
        $params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'resource'));
        $body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
        $this->assertTrue(is_array($body));
        $this->assertTrue(isset($body['entry']), 'entryリソースがありません');
        $this->assertTrue($body['entry']['id'] == 1, 'id=1のリソースがありません');
        // page
        $params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'html'));
        $body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
        $this->assertTrue(is_string($body));
        $this->assertContains('ピー・エイチ・ピー ハイパーテキスト', $body);
        $this->assertRegExp('/<html.*>/', $body, 'html開始タグが存在しません。');
        $this->assertRegExp('/<\/html.*>/', $body, 'html終了タグが存在しません。');
        // page - Docomo
        $params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'html', 'page' => array('ua' => 'Docomo')));
        $body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
        $this->assertTrue(is_string($body));
        $this->assertRegExp('/<html.*>/', $body, 'html開始タグが存在しません。');
        $this->assertRegExp('/<\/html.*>/', $body, 'html終了タグが存在しません。');
        $this->assertContains(mb_convert_encoding('ピー・エイチ・ピー ハイパーテキスト', 'sjis', 'utf8'), $body);
    }

    /**
     * page://db/select/item
     *
     * @todo testメソッドを２回行うとなぜかリソース取得がうまくできない
     *
     */
    public function __bad__testPageDbSelectItemPhp2()
    {
        // resource
        $params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'resource'));
        $body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
        $this->assertTrue(is_array($body));
        $this->assertTrue(isset($body['entry']), 'entryリソースがありません');
        $this->assertTrue($body['entry']['id'] == 1, 'id=1のリソースがありません');
        // page
        $params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'html'));
        $body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
        $this->assertTrue(is_string($body));
        $this->assertContains('ピー・エイチ・ピー ハイパーテキスト', $body);
        $this->assertRegExp('/<html.*>/', $body, 'html開始タグが存在しません。');
        $this->assertRegExp('/<\/html.*>/', $body, 'html終了タグが存在しません。');
        // page - Docomo
        $params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'html', 'page' => array('ua' => 'Docomo')));
        $body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
        $this->assertTrue(is_string($body));
        $this->assertRegExp('/<html.*>/', $body, 'html開始タグが存在しません。');
        $this->assertRegExp('/<\/html.*>/', $body, 'html終了タグが存在しません。');
        $this->assertContains(mb_convert_encoding('ピー・エイチ・ピー ハイパーテキスト', 'sjis', 'utf8'), $body);
    }
}
