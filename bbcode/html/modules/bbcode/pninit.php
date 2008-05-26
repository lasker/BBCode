<?php
// $Id$
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
 * @subpackage bbcode
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * init module
*/
function bbcode_init() 
{
    // create hook
    if (!pnModRegisterHook('item',
                           'transform',
                           'API',
                           'bbcode',
                           'user',
                           'transform')) {
        return LogUtil::registerError(_BBCODE_COULDNOTREGISTER . ' (transform hook)');
    }

    // setup module vars
    pnModSetVar('bbcode', 'quote', '<div><h3 class="bbquoteheader">%u</h3><blockquote class="bbquotetext">%t</blockquote></div>');
    pnModSetVar('bbcode', 'code',  '<div><h3 class="bbcodeheader">%h</h3><div class="bbcodetext">%c</div></div>');
    pnModSetVar('bbcode', 'size_tiny',   '0.75em');
    pnModSetVar('bbcode', 'size_small',  '0.85em');
    pnModSetVar('bbcode', 'size_normal', '1.0em');
    pnModSetVar('bbcode', 'size_large',  '1.5em');
    pnModSetVar('bbcode', 'size_huge',   '2.0em');
    pnModSetVar('bbcode', 'allow_usersize', false);
    pnModSetVar('bbcode', 'allow_usercolor', false);
    pnModSetVar('bbcode', 'code_enabled', true);
    pnModSetVar('bbcode', 'quote_enabled', true);
    pnModSetVar('bbcode', 'color_enabled', true);
    pnModSetVar('bbcode', 'size_enabled', true);
    pnModSetVar('bbcode', 'lightbox_enabled', true);
    pnModSetVar('bbcode', 'lightbox_previewwidth', 200);
    pnModSetVar('bbcode', 'syntaxhilite', HILITE_GOOGLE); // google code prettifier
    pnModSetVar('bbcode', 'link_shrinksize',  30);
    pnModSetVar('bbcode', 'spoiler_enabled',  true);
    pnModSetVar('bbcode', 'spoiler',  '<div><h3 class="bbcodeheader">%h</h3><div class="bbspoiler">%s</div></div>');

    // Initialisation successful
    return true;
}

/**
 * upgrade module
*/
function bbcode_upgrade($oldversion)
{
	switch($oldversion) {
	    case '1.10':
            pnModSetVar('pn_bbcode', 'quoteheader_start', '<fieldset style="background-color: '.pnThemeGetVar('bgcolor2').'; text-align: left; border: 1px solid black;"><legend style="font-weight: bold;">');
            pnModSetVar('pn_bbcode', 'quoteheader_end',   '</legend>');
            pnModSetVar('pn_bbcode', 'quotebody_start',   '');
            pnModSetVar('pn_bbcode', 'quotebody_end',     '</fieldset>');
            pnModSetVar('pn_bbcode', 'codeheader_start',  '<fieldset style="background-color: '.pnThemeGetVar('bgcolor2').'; text-align: left; border: 1px solid black;"><legend style="font-weight: bold;">');
            pnModSetVar('pn_bbcode', 'codeheader_end',    '</legend>');
            pnModSetVar('pn_bbcode', 'codebody_start',    '<pre>');
            pnModSetVar('pn_bbcode', 'codebody_end',      '</pre></fieldset>');
        case '1.12':
            pnModSetVar('pn_bbcode', 'size_tiny',   '0.75em');
            pnModSetVar('pn_bbcode', 'size_small',  '0.85em');
            pnModSetVar('pn_bbcode', 'size_normal', '1.0em');
            pnModSetVar('pn_bbcode', 'size_large',  '1.5em');
            pnModSetVar('pn_bbcode', 'size_huge',   '2.0em');
            pnModSetVar('pn_bbcode', 'allow_usersize', 'no');
            pnModSetVar('pn_bbcode', 'allow_usercolor', 'no');
            pnModSetVar('pn_bbcode', 'color_enabled', 'yes');
            pnModSetVar('pn_bbcode', 'size_enabled', 'yes');
        case '1.14':
            pnModSetVar('pn_bbcode', 'linenumbers', 'yes');
            $quote = pnModGetVar('pn_bbcode', 'quoteheader_start') . '%u' .
                     pnModGetVar('pn_bbcode', 'quoteheader_end') .
                     pnModGetVar('pn_bbcode', 'quotebody_start') . '%t' .
                     pnModGetVar('pn_bbcode', 'quotebody_end');
            pnModSetVar('pn_bbcode', 'quote', stripslashes(pnVarPrepForStore($quote)));
            $code = pnModGetVar('pn_bbcode', 'codeheader_start') . '%h' .
                    pnModGetVar('pn_bbcode', 'codeheader_end') .
                    pnModGetVar('pn_bbcode', 'codebody_start') . '%c' .
                    pnModGetVar('pn_bbcode', 'codebody_end');
            pnModSetVar('pn_bbcode', 'code', stripslashes(pnVarPrepForStore($code)));
            pnModDelVar('pn_bbcode', 'quoteheader_start');
            pnModDelVar('pn_bbcode', 'quoteheader_end');
            pnModDelVar('pn_bbcode', 'quotebody_start');
            pnModDelVar('pn_bbcode', 'quotebody_end');
            pnModDelVar('pn_bbcode', 'codeheader_start');
            pnModDelVar('pn_bbcode', 'codeheader_end');
            pnModDelVar('pn_bbcode', 'codebody_start');
            pnModDelVar('pn_bbcode', 'codebody_end');
        case '1.15':
            pnModSetVar('pn_bbcode', 'syntaxhilite', 'yes');
        case '1.17':
            // display hook
            if (!pnModRegisterHook('item',
                                   'display',
                                   'GUI',
                                   'pn_bbcode',
                                   'user',
                                   'codes')) {
                pnSessionSetVar('errormsg', _BBCODE_COULDNOTREGISTER . ' (display hook)');
                return false;
            }
            pnModSetVar('pn_bbcode', 'displayhook', 'yes');
        case '1.18':
            // replace displayhook
            if (!pnModUnregisterHook('item',
                                     'display',
                                     'GUI',
                                     'pn_bbcode',
                                     'user',
                                     'codes')) {
                return LogUtil::registerError(_BBCODE_COULDNOTUNREGISTER . ' (display hook)');
            }
            pnModDelVar('pn_bbcode', 'displayhook');
        case '1.22':
            // syntax highlight: yes/no and linenumber yes/no gets replaced with 
            // 0 = no highlighting
            // 1 = geshi with linenumbers
            // 2 = geshi without linenumbers
            // 3 = google code prettifier
            $hilite      = pnModGetVar('pn_bbcode', 'syntaxhilite');
            $linenumbers = pnModGetVar('pn_bbcode', 'linenumbers');
            if($hilite=='no') {
                pnModSetVar('pn_bbcode', 'syntaxhilite', HILITE_NONE);
            } elseif ($hilite='yes') {                
                if($linenumbers=='yes') {
                    pnModSetVar('pn_bbcode', 'syntaxhilite', HILITE_GESHI_WITH_LN);
                } else {
                    pnModSetVar('pn_bbcode', 'syntaxhilite', HILITE_GESHI_WITHOUT_LN);
                }
            }
            pnModDelVar('pn_bbcode', 'linenumbers');
            // remove <pre></pre> from code setting
            $code = pnModGetVar('pn_bbcode', 'code');
            $code = str_replace(array('<pre>','</pre>'), '', $code);
            pnModSetVar('pn_bbcode', 'code', $code);
        case '1.30': // last version to support .764            
            pnModSetVar('bbcode', 'code_enabled', true);
            pnModSetVar('bbcode', 'quote_enabled', true);
            pnModSetVar('bbcode', 'lightbox_enabled', true);
            pnModSetVar('bbcode', 'lightbox_previewwidth', 200);
            pnModSetVar('bbcode', 'link_shrinksize',  30);
            pnModSetVar('bbcode', 'spoiler_enabled',  true);
            pnModSetVar('bbcode', 'spoiler',  '<div><h3 class="bbcodeheader">%h</h3><div class="bbspoiler">%s</div></div>');

            $oldvars = pnModGetVar('pn_bbcode');
            foreach ($oldvars as $varname => $oldvar) {
                pnModSetVar('bbcode', $varname, $oldvar);
            }
            pnModDelVar('pn_bbcode');

            // get list of hooked modules
            $hookedmods = pnModAPIFunc('modules', 'admin', 'gethookedmodules', array('hookmodname' => 'pn_bbcode'));
            
            // remove hook
            if (!pnModUnregisterHook('item',
                                     'transform',
                                     'API',
                                     'pn_bbcode',
                                     'user',
                                     'transform')) {
                return LogUtil::registerError(_BBCODE_COULDNOTUNREGISTER . ' (transform hook)');
            } 
            // add hook
            if (!pnModRegisterHook('item',
                                   'transform',
                                   'API',
                                   'bbcode',
                                   'user',
                                   'transform')) {
                return LogUtil::registerError(_BBCODE_COULDNOTREGISTER . ' (transform hook)');
            }
            
            // attach bbcode to previous hooked modules
            foreach ($hookedmods as $hookedmod => $dummy) {
                pnModAPIFunc('modules' ,'admin', 'enablehooks', 
                             array('callermodname' => $hookedmod,
                                   'hookmodname'   => 'bbcode'));
            }

        default:
             break;
    }
    return true;
}

/**
 * delete module
*/
function bbcode_delete()
{
    // remove hook
    if (!pnModUnregisterHook('item',
                             'transform',
                             'API',
                             'bbcode',
                             'user',
                             'transform')) {
        return LogUtil::registerError(_BBCODE_COULDNOTUNREGISTER . ' (transform hook)');
    }

    // remove all module vars
    pnModDelVar('bbcode');

    // Deletion successful
    return true;
}