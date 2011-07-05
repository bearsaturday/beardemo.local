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
 * ダイナミック絵文字
 *
 * 単純な絵文字配列を返す絵文字リソースをページングして表示しています。
 * キャリアは$_GET['ua']で指定されます。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Test_Emoji_Dynamic extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->injectGet('ua', 'ua', 'Docomo');
        $this->injectGet('pager', 'pager', 10);
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
    	$options['pager'] = $args['pager'];
    	$emoji = $this->_resource->read(array('uri' =>"Emoji/{$args['ua']}", 'options' => $options))->set('emoji');
        $this->set('ua', $args['ua']);
    }
}

App_Main::run('Page_Test_Emoji_Dynamic');