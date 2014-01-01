<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

JFactory::getDocument()->addScript(JUri::base(true) . '/modules/' . $module->module . '/tmpl/guildtabard.js');
JFactory::getDocument()->addStyleSheet(JUri::base(true) . '/modules/' . $module->module . '/tmpl/default.css');
?>
<?php if ($params->get('ajax')) : ?>
    <div class="mod_wow_guild_tabard ajax"></div>
<?php else: ?>
    <div class="mod_wow_guild_tabard">
        <canvas id="wow_guild_tabard" width="<?php echo (int)$params->get('size', 240); ?>"
                height="<?php echo (int)$params->get('size', 240); ?>"></canvas>
        <script type="text/javascript">
            new GuildTabard('wow_guild_tabard', <?php echo json_encode($tabard)?>);
        </script>
    </div>
<?php endif; ?>