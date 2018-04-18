<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
interface App_Form_Interface
{
    /**
     * Is valid submit ?
     *
     * @return bool
     */
    public function validate();

    /**
     * Get validated submit value
     */
    public function exportValues();
}
