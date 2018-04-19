<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * 画像リサイズ
 *
 * リモート or ローカル画像ファイルを取得、リサイズ、GIFフォーマット変換して表示します。
 *
 * @license    @license@ http://@license_url@
 *
 * @link       http://@link_url@
 */
class Page_Image_Resize_Index extends App_Page
{
    /**
     * 画像ファイル
     *
     * @var string
     */
    private $_file;

    /**
     * GDアダプターとローカルファイルをインジェクト
     */
    public function onInject()
    {
        parent::onInject();
        $this->_img = BEAR::dependency('BEAR_Img', array('adapter' => BEAR_Img::ADAPTER_GD));
        $this->injectGet('file', 'file', _BEAR_APP_HOME . '/htdocs/image/eye.png');
        $this->injectGet('size_x', 'x', 300);
        $this->injectGet('size_y', 'y', 300);
        $this->injectGet('is_mobile', 'mobile', false);
    }

    /**
     * iMagcikアダプターとリモートファイルをインジェクト
     */
    public function onInjectMagick()
    {
        parent::onInject();
        $this->_img = BEAR::dependency('BEAR_Img', array('adapter' => BEAR_Img::ADAPTER_MAGICK));
        $this->injectGet('file', 'file', 'http://upload.wikimedia.org/wikipedia/commons/f/f3/Hubble_Ultra_Deep_Field_part_d.jpg');
        $this->injectGet('size_x', 'x', 600);
        $this->injectGet('size_y', 'y', 600);
        $this->injectGet('is_mobile', 'mobile', false);
    }

    /**
     * Init
     *
     * @param array $args
     */
    public function onInit(array $args)
    {
        //画像ライブラリ選択
        $this->_img->load($args['file']);
        // 縦、横どちらの幅に合わせるか自動判定し、プロポーションを維持してリサイズ
        if ($args['is_mobile'] !== false) {
            // 携帯のエージェントに合わせてリサイズ
            $this->_img->resizeMobile();
        } else {
            $this->_img->resize($args['size_x'], $args['size_y']);
        }
        // 保存
        //$img->save('/tmp/aaa.png', 'png');
    }

    /**
     * Output
     */
    public function onOutput()
    {
        $this->_img->show('gif');
        $this->end();
    }
}

$config = array('injector' => (isset($_GET['magick']) ? 'onInjectMagick' : 'onInject'));
App_Main::run('Page_Image_Resize_Index', $config);
