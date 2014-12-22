<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class ModWowGuildTabardHelper extends WoWModuleAbstract
{
    protected function getInternalData()
    {
        try {
            $result = WoW::getInstance()->getAdapter('WoWAPI')->getData('guild');
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $tabard = new stdClass;
        $tabard->ring = ($result->body->side == 1) ? 'horde' : 'alliance';
        $tabard->staticUrl = JUri::base(true) . '/media/mod_wow_guild_tabard/images/';
        $tabard->emblem = $this->AlphaHexToRGB($result->body->emblem->iconColor, $result->body->emblem->icon);
        $tabard->border = $this->AlphaHexToRGB($result->body->emblem->borderColor, $result->body->emblem->border);
        $tabard->bg = $this->AlphaHexToRGB($result->body->emblem->backgroundColor, 0);
        return $tabard;
    }

    private function AlphaHexToRGB($color, $first)
    {
        $array = array_map('hexdec', str_split($color, 2));
        $array[0] = $first; // override alpha value
        return $array;
    }
}