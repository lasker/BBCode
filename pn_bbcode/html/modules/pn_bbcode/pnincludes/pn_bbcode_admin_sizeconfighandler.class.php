<?php
// $Id: mh_admin_edithandler.class.php 161 2007-01-28 17:00:20Z landseer $
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

class pn_bbcode_admin_sizeconfighandler
{

    function initialize(&$pnRender)
    {
        $pnRender->caching = false;
        $pnRender->add_core_data();
        return true;
    }


    function handleCommand(&$pnRender, &$args)
    {
        // Security check
        if (!SecurityUtil::checkPermission('pn_bbcode::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError('index.php');
        }  
        if ($args['commandName'] == 'submit') {
            $ok = $pnRender->pnFormIsValid(); 
            $data = $pnRender->pnFormGetValues();

            if(!_validate_size_input($data['size_tiny'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_tiny');
                $ifield->setError(DataUtil::formatForDisplay(_PNBBCODE_ILLEGALVALUE));
                $ok = false;
            }
            if(!_validate_size_input($data['size_small'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_small');
                $ifield->setError(DataUtil::formatForDisplay(_PNBBCODE_ILLEGALVALUE));
                $ok = false;
            }
            if(!_validate_size_input($data['size_normal'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_normal');
                $ifield->setError(DataUtil::formatForDisplay(_PNBBCODE_ILLEGALVALUE));
                $ok = false;
            }
            if(!_validate_size_input($data['size_large'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_large');
                $ifield->setError(DataUtil::formatForDisplay(_PNBBCODE_ILLEGALVALUE));
                $ok = false;
            }
            if(!_validate_size_input($data['size_huge'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_huge');
                $ifield->setError(DataUtil::formatForDisplay(_PNBBCODE_ILLEGALVALUE));
                $ok = false;
            }

            if(!$ok) {
                return false;
            }

            pnModSetVar('pn_bbcode', 'size_tiny',  $data['size_tiny']);
            pnModSetVar('pn_bbcode', 'size_small',  $data['size_small']);
            pnModSetVar('pn_bbcode', 'size_normal',  $data['size_normal']);
            pnModSetVar('pn_bbcode', 'size_large',  $data['size_large']);
            pnModSetVar('pn_bbcode', 'size_huge',  $data['size_huge']);
            pnModSetVar('pn_bbcode', 'size_enabled',  $data['size_enabled']);
            pnModSetVar('pn_bbcode', 'allow_usersize',  $data['allow_usersize']);
            LogUtil::registerStatus(_PNBBCODE_CONFIGCHANGED);
        }
        return pnRedirect(pnModURL('pn_bbcode', 'admin', 'sizeconfig'));
    }

}

function _validate_size_input(&$input='')
{
    $input = strtolower(trim($input));
    return (bool)preg_match('/(^\d{1,4}|(^\d{1,4}\.{0,1}\d{1,2}))(cm|em|ex|in|mm|pc|pt|px|\%)/', $input);
}