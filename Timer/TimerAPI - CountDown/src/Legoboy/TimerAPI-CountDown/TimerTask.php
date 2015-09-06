<?php

namespace Legoboy\TimerAPI-CountDown;

use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;

class TimerTask extends PluginTask{

    public function __construct(Main $plugin, $secsTotal){
        $this->plugin = $plugin;
		$this->secsTotal = $secsTotal;
	    parent::__construct($plugin);
    }

    public function onRun($currentTick){
	    $this->endingtime = $this->getOwner()->seconds + $this->secsTotal;
	    $this->secondsLeft = $this->endingtime - time(); //Caculating the time left
	    $this->getOwner()->getLogger()->info(TextFormat::YELLOW . $this->secondsLeft . " seconds left.");
	    if($this->secondsLeft == 5){ 
            $this->getOwner()->getServer()->broadcastMessage(TextFormat::GREEN . "YAY!");
        }elseif($this->secondsLeft <= 0){
		    $this->getOwner()->getServer()->broadcastMessage(TextFormat::DARK_BLUE . "Ending!!!");
			$this->getOwner()->getServer()->getScheduler()->cancelTasks($this->getOwner());
		}
    }
}
