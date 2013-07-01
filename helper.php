<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
 
defined('_JEXEC') or die;

abstract class mod_wow_guild_tabard {
	
	public static function _(JRegistry &$params) {
        $url = 'http://' . $params->get('region') . '.battle.net/api/wow/guild/' . $params->get('realm') . '/' . $params->get('guild');

        $cache = JFactory::getCache(__CLASS__, 'output');
    	$cache->setCaching(1);
    	$cache->setLifeTime($params->get('cache_time', 60));
    	
    	$key = md5($url);
    	
    	if(!$result = $cache->get($key)) {
    		try {
    			$http = new JHttp(new JRegistry, new JHttpTransportCurl(new JRegistry));
    			$http->setOption('userAgent', 'Joomla! ' . JVERSION . '; WoW Guild Tabard; php/' . phpversion());
    		
    			$result = $http->get($url, null, $params->get('timeout', 10));
    		}catch(Exception $e) {
    			return $e->getMessage();
    		}
    		
    		$cache->store($result, $key);
    	}
    	
    	if($result->code != 200) {
    		return __CLASS__ . ' HTTP-Status ' . JHtml::_('link', 'http://wikipedia.org/wiki/List_of_HTTP_status_codes#'.$result->code, $result->code, array('target' => '_blank'));
    	}
        
        $result->body = json_decode($result->body);
        // https://github.com/ArmorySuite/AS-WoW-Core/blob/master/-main.php
        /*
         * 
         * var tabard = new GuildTabard('canvas-element', {
		 *	 		'ring': 'alliance',
		 *			'bg': [ 0, 2, 2, 2 ],
		 *			'border': [ 0, 4, 4, 4 ],
		 *			'emblem': [ 65, 5, 5, 5 ]
		 *		});
         * 
         [emblem] => stdClass Object
                (
                    [icon] => 151
                    [iconColor] => ff101517
                    [border] => 0
                    [borderColor] => ff0f1415
                    [backgroundColor] => ff232323
                )
         */
        
        $tabard = new stdClass;
        $tabard->staticUrl = 'http://' . $params->get('region') . '.battle.net'; 
        $tabard->ring = ($result->body->side == 1) ? 'horde' : 'alliance';
        $tabard->bg = array();
        $tabard->border = array();
        $tabard->emblem = array($result->body->icon);
       
		return $tabard;
    }
    
    private static function AlphaHexToAlphaRGB($str) {
    	return array_map('hexdec', str_split($str, 2));
    }
}