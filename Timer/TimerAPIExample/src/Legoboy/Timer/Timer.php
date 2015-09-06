<?php

namespace Legoboy\Timer;

use pocketmine\plugin\PluginBase; //Whatever you use in the plugin, you need to have it here.
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use Legoboy\TimerAPI\Main;

class Timer extends PluginBase implements Listener{ //Class name needs to be same as the file name.

        public function onEnable(){
		    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getLogger()->info(TextFormat::BLUE . "Timer has been enabled!");
			
//////////////////////////////Reqired Setup...//////////////////////////////
			$this->timerapi = $this->getServer()->getPluginManager()->getPlugin("TimerAPI");
			$this->getServer()->enablePlugin($this->timerapi);
//////////////////////////////////////////////////////////////////////////////////////////////
			$secsTotal = 10;
			$this->timerapi->startCountUp($secsTotal);
        }
}