<?php
/**
 * bear.demo
 *
 * @package Page
 */
require_once 'App.php';

/**
 * HTTP404
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id:$
 */
class Page_Http_404 extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        throw new Panda_Exception('Not found', 404);
    }
}

App_Main::run('Page_Http_404');