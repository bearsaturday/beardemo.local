<?php

require_once 'App.php';

/**
 * シンプルフォーム
 */
class Page_Form_Poe_Index extends App_Page
{
    /**
     * @var App_Form_Simple
     */
    private $_form;

    public function onInject()
    {
        $this->_form = BEAR::dependency('App_Form_Simple');
        parent::onInject();
    }

    public function onInit(array $args)
    {
        $this->_form->build();
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
        $this->display('/form/simple/action.tpl');  // 通常はredirectさせて画面出力します。
    }
}

App_Main::run('Page_Form_Poe_Index');
