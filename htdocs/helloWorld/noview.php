<?php
/**
 * App
 *
 * @category   BEAR
 * @package    @app@
 * @subpackage Page
 * @author     akihito <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * HelloWorld with no view
 *
 * @category   BEAR
 * @package    @app@
 * @subpackage Page
 * @author     akihito <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_HelloWorld_NoView extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $this->set('message', 'Hello World!');
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $view = $this->getValues();
        require _BEAR_APP_HOME . '/App/views/pages/hello/noview.php';
    }
    }

App_Main::run('Page_HelloWorld_NoView');