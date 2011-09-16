<?php

interface App_Form_Interface {

    /**
     * Is valid submit ?
     *
     * @return bool
     */
    public function validate();

    /**
     * Get validated submit value
     *
     * @return void
     */
    public function exportValues();
}