<?php
// $Id: pnuser.php 135 2007-04-07 12:39:16Z landseer $
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

/**
 * @package PostNuke_Utility_Modules
 * @subpackage pn_bbcode
 * @license http://www.gnu.org/copyleft/gpl.html
*/


/**
 * get available admin panel links
 *
 * @author Mark West
 * @return array array of admin links
 */
function pn_bbcode_adminapi_getlinks()
{
    $links = array();
    if (SecurityUtil::checkPermission('pn_bbcode::', '::', ACCESS_ADMIN)) {
        $links[] = array('url' => pnModURL('pn_bbcode', 'admin', 'main'),        'text' => _PNBBCODE_ADMIN_START,      'title' => _PNBBCODE_ADMIN_START);     
        $links[] = array('url' => pnModURL('pn_bbcode', 'admin', 'codeconfig'),  'text' => _PNBBCODE_ADMINCODECONFIG,  'title' => _PNBBCODE_ADMINCODECONFIG); 
        $links[] = array('url' => pnModURL('pn_bbcode', 'admin', 'quoteconfig'), 'text' => _PNBBCODE_ADMINQUOTECONFIG, 'title' => _PNBBCODE_ADMINQUOTECONFIG);
        $links[] = array('url' => pnModURL('pn_bbcode', 'admin', 'sizeconfig'),  'text' => _PNBBCODE_ADMINSIZECONFIG,  'title' => _PNBBCODE_ADMINSIZECONFIG); 
        $links[] = array('url' => pnModURL('pn_bbcode', 'admin', 'colorconfig'), 'text' => _PNBBCODE_ADMINCOLORCONFIG, 'title' => _PNBBCODE_ADMINCOLORCONFIG);
        $links[] = array('url' => pnModURL('pn_bbcode', 'admin', 'miscconfig'),  'text' => _PNBBCODE_ADMINMISCCONFIG,  'title' => _PNBBCODE_ADMINMISCCONFIG);
    }
    return $links;
}
