<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
 
defined('_JEXEC') or die;

$tabard = 'var tabard=new GuildTabard("guild-tabard",' . json_encode($tabard) . ');';

if(version_compare(JVERSION, '3.0', 'ge')) {
	JHtml::_('jquery.framework');
	$onload = 'jQuery(document).ready(function(){' . $tabard . '});';
}else{
	JHTML::_('behavior.mootools');
	$onload = 'window.addEvent("domready",function(){' . $tabard . '});';
}

JFactory::getDocument()->addScript(JUri::base(true) . '/modules/' . $module->module . '/tmpl/guildtabard.js');
JFactory::getDocument()->addScriptDeclaration($onload);

?>
<div class="mod_wow_guild_tabard">
<canvas id="guild-tabard" width="240" height="240">
	<div class="guild-tabard-default"></div>
</canvas>
	<?php 
		/*
		'ring': 'horde',
		'bg': [ 0, 45 ],
		'border': [ 0, 15 ],
		'emblem': [ 151, 15 ]

		----

		'ring': 'horde',
		'bg': [ 0, 5 ],
		'border': [ 4, 15 ],
		'emblem': [ 131, 15 ]

		----

		'ring': 'alliance',
		'bg': [ 0, 45 ],
		'border': [ 0, 14 ],
		'emblem': [ 97, 14 ]

		----

		'ring': 'alliance',
		'bg': [ 0, 2 ],
		'border': [ 5, 15 ],
		'emblem': [ 73, 16 ]
		*/
	?>

</div>