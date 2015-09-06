<?php

namespace Legoboy\TimerAPI-CountDown;

use pocketmine\plugin\PluginBase; //Whatever you use in the plugin, you need to have it here.
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{ //Class name needs to be same as the file name.

        public function onEnable(){
		    $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->getLogger()->info(TextFormat::BLUE . "TimerAPI has been enabled!");
			$secsTotal = 10;
			$this->startTime($secsTotal);
        }
		
		public function startCountDown($secsTotal){
            $this->seconds = time(); //Has to be static
			$this->getServer()->getScheduler()->scheduleRepeatingTask(new TimerTask($this, $secsTotal), 20);
		}
	}