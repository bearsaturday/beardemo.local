<?php

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
