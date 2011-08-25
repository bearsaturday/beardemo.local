<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * ajax - resource
 *
 * onInit()でsetされたリソースを指定のIDをプレースホルダにしてコンテンツを埋め込みます。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Ajax_Basic_Ajax_Resource extends App_Page
{

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        $this->_resource = BEAR::dependency('BEAR_Resource');
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $config)
    {
        $options['mock']['name'] = 'test';
        $options['mock']['x'] = array('name', 'age', 'gender');
        $options['mock']['y'] = 2;
        $options['template'] = 'person';
        $params = array('uri' => 'person', 'options' => $options);
        $this->_resource->read($params)->set();
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->_ajax->addAjax(
            'resource',
            array('person1' => 'person'),
            array('effect' => 'slide')
        );
        $this->_ajax->addAjax(
            'html',
            array('msg' => 'AJAXリソース取得'),
            array('effect' => 'show')
        );
        $this->output('ajax');
    }
}

BEAR_Main::run('Page_Ajax_Basic_Ajax_Resource');