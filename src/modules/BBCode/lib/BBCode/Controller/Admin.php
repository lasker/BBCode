<?php
/**
 * BBCode
 *
 * @license http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Utility_Modules
 * @subpackage BBCode
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

class BBCode_Controller_Admin extends Zikula_AbstractController
{
    /**
    * main function
    *
    */
    public function main()
    {
        if (!SecurityUtil::checkPermission('BBCode::', "::", ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError(System::getVar('entrypoint', 'index.php'));
        }


        // Create output object
        $form = FormUtil::newForm('BBCode', $this);
        // Return the output that has been generated by this function
        return $form->execute('bbcode_admin_config.tpl', new BBCode_Form_Handler_Admin_ModifyConfig());
    }

}
