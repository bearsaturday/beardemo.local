<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Docomo 絵文字リソース
 *
 */
class App_Ro_Emoji_Docomo extends App_Ro
{
    /**
     * Read
     *
     * @param array $values
     *
     * @return array
     */
    public function onRead($values)
    {
        // Docomo 基本+拡張絵文字
        for ($i = BEAR_Emoji::DOCOMO_MIN; $i <= 63740; $i++) {
            $result[] = array('key' => $i, 'value' => "&#{$i};");
        }
        for ($i = 63808; $i <= BEAR_Emoji::DOCOMO_MAX; $i++) {
            $result[] = array('key' => $i, 'value' => "&#{$i};");
        }

        return $result;
    }
}
