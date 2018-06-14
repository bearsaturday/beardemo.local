<?php

/**
 * App custom form
 *
 * @see http://pear.php.net/package/HTML_QuickForm_Renderer_Tableless
 */
class App_Form_Renderer_Mobile extends HTML_QuickForm_Renderer_Tableless
{
    /**
     * Header Template string
     *
     * @var string
     */
    private $_headerTemplate = "\n\t\t<legend>{header}</legend>\n\t\t<ol>";

    /**
     * Element template string
     *
     * @var string
     */
    private $_elementTemplate = "\n\t\t<li><label class=\"element\"><!-- BEGIN required --><span class=\"required\">*</span><!-- END required -->{label}</label><div class=\"element<!-- BEGIN error -->_error<!-- END error -->\">{element}<!-- BEGIN error --><span class=\"error\">{error}</span><!-- END error --><!-- BEGIN label_3 -->{label_3}<!-- END label_3 --><!-- BEGIN label_2 --><br /><span style=\"font-size: 80%;\">{label_2}</span><!-- END label_2 --></div></li>";
    /**
     * Form template string
     *
     * @var string
     */
    private $_formTemplate = "\n<form{attributes}>\n\t<div style=\"display: none;\">\n{hidden}\t</div>\n{content}\n</form>";

    /**
     * Template used when opening a fieldset
     *
     * @var string
     */
    private $_openFieldsetTemplate = "\n\t<fieldset{id}{attributes}>";

    /**
     * Template used when opening a hidden fieldset
     * (i.e. a fieldset that is opened when there is no header element)
     *
     * @var string
     */
    private $_openHiddenFieldsetTemplate = "\n\t<fieldset class=\"hidden{class}\">\n\t\t<ol>";

    /**
     * Template used when closing a fieldset
     *
     * @var string
     */
    private $_closeFieldsetTemplate = "\n\t\t</ol>\n\t</fieldset>";

    /**
     * Required Note template string
     *
     * @var string
     */
    private $_requiredNoteTemplate
        = "\n\t\t\t<li class=\"reqnote\"><label class=\"element\">&nbsp;</label>{requiredNote}</li>";

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->HTML_QuickForm_Renderer_Default();
    }
}
