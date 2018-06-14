<?php


/**
 * Softbank 絵文字リソース
 */
class App_Ro_Emoji_Softbank extends App_Ro
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
        // Softbank UTF-8 10進数
        // E001-E05A
        // E201-E253
        // E301-E34D
        // E401-E44C
        // E501-E537
        for ($i = BEAR_Emoji::SOFTBANK_MIN; $i <= 0xE05A; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }
        for ($i = 0xE201; $i <= 0xE253; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }
        for ($i = 0xE301; $i <= 0xE34D; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }
        for ($i = 0xE401; $i <= 0xE44C; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }
        for ($i = 0xE501; $i <= BEAR_Emoji::SOFTBANK_MAX; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }

        return $result;
    }
}
