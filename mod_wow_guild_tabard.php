<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';

$params->set('guild', rawurlencode(strtolower($params->get('guild'))));
$params->set('realm', rawurlencode(strtolower($params->get('realm'))));
$params->set('region', strtolower($params->get('region')));

$tabard = mod_wow_guild_tabard::_($params);

if (!is_object($tabard)) {
    echo $tabard;
    return;
}

require JModuleHelper::getLayoutPath($module->module, $params->get('layout', 'default'));