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
 * 画像リサイズ
 *
 * リモート or ローカル画像ファイルを取得、リサイズ、GIFフォーマット変換して表示します。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
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
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->_img = BEAR::dependency('BEAR_Img', array('adapter' => BEAR_Img::ADAPTER_GD));
        $this->_file = _BEAR_APP_HOME . '/htdocs/image/eye.png';
    }

    /**
     * iMagcikアダプターとリモートファイルをインジェクト
     *
     * @return void
     */
    public function onInjectMagick()
    {
        parent::onInject();
        $this->_img = BEAR::dependency('BEAR_Img', array('adapter' => BEAR_Img::ADAPTER_MAGICK));
        $this->_file = 'http://upload.wikimedia.org/wikipedia/commons/f/f3/Hubble_Ultra_Deep_Field_part_d.jpg';
    }

    /**
     * Init
     *
     * @param array $args
     *
     * @return void
     */
    public function onInit(array $args)
    {
        //画像ライブラリ選択
        $this->_img->load($this->_file);
        // 縦、横どちらの幅に合わせるか自動判定し、プロポーションを維持してリサイズ
        $this->_img->resize(300, 500);
        // 携帯のエージェントに合わせてリサイズ
        //$this->_img->resizeMobile();
        // 保存
        //$img->save('/tmp/aaa.png', 'png');
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->_img->show('gif');
        $this->end();
    }
}

$config = array('injector' => (isset($_GET['m']) ? 'onInjectMagick' : 'onInject'));
App_Main::run('Page_Image_Resize_Index', $config);