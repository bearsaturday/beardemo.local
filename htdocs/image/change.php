<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * 画像アダプター変更画像編集
 *
 * GDで読み込みリサイズし、Cairoでアウトライン付文字を追加して、iMagickで画像を傾けPNGで表示しています
 *
 * @license    @license@ http://@license_url@
 *
 * @link       http://@link_url@
 */
class Page_Image_Change extends App_Page
{
    /**
     * @var BEAR_Img_Adapter_Gd
     */
    private $_img;

    /**
     * GDアダプターとローカルファイルをインジェクト
     */
    public function onInject()
    {
        parent::onInject();
        $this->_img = BEAR::dependency('BEAR_Img', array('adapter' => BEAR_Img::ADAPTER_GD));
        $this->injectGet('file', 'file', _BEAR_APP_HOME . '/htdocs/image/eye.png');
        $this->injectGet('size_x', 'x', 400);
        $this->injectGet('size_y', 'y', 400);
        $this->injectGet('text', 'text', 'The eyes of God');
        $this->injectGet('degree', 'degree', 10);
    }

    /**
     * Init
     *
     * @param array $args
     */
    public function onInit(array $args)
    {
        $this->_img->load($args['file']);
        $this->_img->resize($args['size_x'], $args['size_y']);
        $this->_img = BEAR_Img::changeAdapter(BEAR_Img::ADAPTER_CAIRO);
        $this->_img->addText(
            $args['text'],
                             0,  // x
                             20, // y
                             45, // size
                             BEAR_Img::CENTER,
                             array(200, 200, 200),
                             array(150, 100, 100),
                             'Arial',
                             0.75,
                             2
        );
        $this->_img = BEAR_Img::changeAdapter(BEAR_Img::ADAPTER_MAGICK);
        $this->_img->adapter->polaroidImage(new ImagickDraw(), $args['degree']);
    }

    /**
     * Output
     */
    public function onOutput()
    {
        $this->_img->show('png');
    }
}

App_Main::run('Page_Image_Change');
