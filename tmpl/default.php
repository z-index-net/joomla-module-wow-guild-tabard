<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @var        stdClass $tabard
 * @var        stdClass $module
 * @var        Joomla\Registry\Registry $params
 */

defined('_JEXEC') or die;

JFactory::getDocument()->addScript('media/' . $module->module . '/js/guildtabard.js');
JFactory::getDocument()->addStyleSheet('media/' . $module->module . '/css/default.css');
?>
<?php if ($params->get('ajax')) : ?>
    <div class="mod_wow_guild_tabard ajax"></div>
<?php else: ?>
    <div class="mod_wow_guild_tabard">
        <canvas id="wow_guild_tabard" width="<?php echo (int)$params->get('size', 240); ?>" height="<?php echo (int)$params->get('size', 240); ?>"></canvas>
        <script>
            new GuildTabard('wow_guild_tabard', <?php echo json_encode($tabard); ?>);
        </script>
    </div>
<?php endif; ?>