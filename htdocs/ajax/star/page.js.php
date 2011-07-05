<?php
/**
 * App
 *
 * レートリソースを取得してJSファイルで利用しています。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage JS
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

require 'App.php';
// レートリソースを取得
$rate = BEAR::dependency('BEAR_Resource')->read(array('uri' => 'Rate'))->getBody() - 1;
?>
$.fn.rating.options.cancelValue = '0';
$.fn.rating.options.callback = function (value) {
    if (!$.app.starReady) {
        return
    }
    if (value) {
        $('input',this.form).rating('disable');
        $('form.rate a').unbind("mouseenter").unbind("mouseleave");
        var click = $.param({ _cn: 'rate', _cv : value});
        $.bear.ajax({url: 'ajax.php?' + click});
    }
};
$(document).ready(function(){
    // init
    $('form.rate :radio').rating({
        cancel: 'Cancel',
        cancelValue: '0'
    });
    // select
    $('form.rate :radio').rating('select', <?php echo $rate; ?>);
    $.app.starReady = true;
    // hover tips
    $.tip = $('#hover-tip').html();
    $('form.rate a').hover(function(){
          var title = $(this).attr('title');
          $('#hover-tip').html(title);
        },
          function(){
              $('#hover-tip').html($.tip);
        }
    );
});
