<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
 
defined('_JEXEC') or die;

$base = JUri::base(true);

JFactory::getDocument()->addScript($base . '/modules/' . $module->module . '/tmpl/guildtabard.js');
JFactory::getDocument()->addStyleSheet($base . '/modules/' . $module->module . '/tmpl/stylesheet.css');
?>
<div class="mod_wow_guild_tabard">
<canvas id="wow_guild_tabard" width="240" height="240"></canvas>
<script type="text/javascript">
new GuildTabard('wow_guild_tabard',<?php echo json_encode($tabard)?>);
</script>
</div>