<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: cache.php 448 2011-06-01 18:02:17Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * リソーステンプレートページ
 *
 * リソーステンプレートにキャッシュオプションを指定しています。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: cache.php 448 2011-06-01 18:02:17Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class Page_Resource_Template_Cache extends App_Page
{

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->injectGet('id', 'id', 1);
    }

    /**
     * Init
     *
     * @requied id
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $params = array(
            'uri' => 'User',
            'values' => array('id' => $args['id']),
            'options' => array(
                'template' => 'user',
                'cache' => array('life' => 100)
            )
        );
        $this->_resource->read($params)->set('user', 'value');
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display('/resource/template.tpl');
    }
}
App_Main::run('Page_Resource_Template_Cache');
