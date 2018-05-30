<?php


/**
 * AU 絵文字リソース
 */
class App_Ro_Emoji_Ezweb extends App_Ro
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
        // Ezweb
        // F340～F3FC
        // F440～F493
        // F640～F6FC
        // F740～F7FC
        for ($i = BEAR_Emoji::EZWEB_MIN; $i <= 0xF3FC; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }
        for ($i = 0xF440; $i <= 0xF493; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }
        for ($i = 0xF640; $i <= 0xF6FC; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }
        for ($i = 0xF740; $i <= BEAR_Emoji::EZWEB_MAX; $i++) {
            $result[] = ['key' => $i, 'value' => "&#{$i};"];
        }

        return $result;
    }
}
