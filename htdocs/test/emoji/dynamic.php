<?php

require_once 'App.php';

/**
 * ダイナミック絵文字
 *
 * 単純な絵文字配列を返す絵文字リソースをページングして表示しています。
 * キャリアは$_GET['ua']で指定されます。
 */
class Page_Test_Emoji_Dynamic extends App_Page
{
    public function onInject()
    {
        $this->injectGet('ua', 'ua', 'Docomo');
        $this->injectGet('pager', 'pager', 10);
        parent::onInject();
    }

    public function onInit(array $args)
    {
        $options['pager'] = $args['pager'];
        $emoji = $this->_resource->read(['uri' => "Emoji/{$args['ua']}", 'options' => $options])->set('emoji');
        $this->set('ua', $args['ua']);
    }
}

App_Main::run('Page_Test_Emoji_Dynamic');
