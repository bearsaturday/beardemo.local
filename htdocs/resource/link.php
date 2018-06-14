<?php

require_once 'App.php';

/**
 * リソースリンクページ
 *
 * ユーザー -> （写真、ブログ ）-> 記事　->　（トラックバック、コメント）->　コメント評価リソースとリンクされています。
 * 括弧内は並列でリンクされているリソースですが以降のリンクは最後のリソースからリンクされます。
 */
class Page_Resource_Link extends App_Page
{
    public function onInject()
    {
        $this->injectGet('id', 'id', 1);
        parent::onInject();
    }

    /**
     * @requied id
     */
    public function onInit(array $args)
    {
        $params = [
            'uri' => 'User',
            'values' => ['id' => $args['id']],
            'options' => [
                'template' => 'link/blog',
                'cache' => ['life' => 10, 'link' => true]
            ]
        ];
        $this->_resource->read($params)->link(['photo', 'blog'])->link('entry')->link(['trackback', 'comment'])->link('thumb')->set('blog', 'object');
    }

    public function onOutput()
    {
        $this->display('/resource/link/list/template.tpl');
    }
}

App_Main::run('Page_Resource_Link');
