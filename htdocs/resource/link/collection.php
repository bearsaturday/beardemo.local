<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * リソースリンクページ
 *
 * ユーザー -> （写真、ブログ ）-> 記事　->　（トラックバック、コメント）->　コメント評価リソースとリンクされています。
 * 括弧内は並列でリンクされているリソースですが以降のリンクは最後のリソースからリンクされます。
 *
 * @license    @license@ http://@license_url@
 *
 * @link       http://@link_url@
 */
class Page_Resource_Link_Collection extends App_Page
{
    /**
     * Inject
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
     */
    public function onInit(array $args)
    {
        $params = array('uri' => 'User', 'values' => array('id' => $args['id']));
        $this->_resource->read($params)->link(array('photo', 'blog'))->link('entry')->link(array('trackback', 'comment'))->link('thumb')->p()->set();
    }

    /**
     * Output
     */
    public function onOutput()
    {
        $this->display('collection.tpl');
    }
}

App_Main::run('Page_Resource_Link_Collection');
