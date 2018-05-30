<?php

require_once 'App.php';

/**
 * シンプルフォーム
 */
class Page_Form_Poe_Index extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Simple')->build();
    }

    public function onOutput()
    {
        $this->display('/form/simple/index.tpl');
    }

    public function onAction(array $submit)
    {
        $params = [
            'uri' => 'Test/Poe',
            'values' => [],
            'options' => [
                BEAR_Resource::OPTION_POE => true,
                BEAR_Resource::OPTION_CSRF => true
            ]
        ];
        $this->_resource->create($params)->request();
        $this->set('submit', print_r($submit, true));
        // テスト用でここで表示してますが通常はredirectさせて画面出力します。
        $this->display('/form/simple/action.tpl');
    }
}

App_Main::run('Page_Form_Poe_Index');
