<?php

namespace Legoboy\TimerAPI;

use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;

class TimerTask extends PluginTask{

    public function __construct(Main $plugin, $secsTotal){
        $this->plugin = $plugin;
		$this->secsTotal = $secsTotal;
	    parent::__construct($plugin);
    }

    public function onRun($currentTick){
	    $this->secondsElapsed = time() - $this->getOwner()->seconds; //Caculating the time past
	    $this->getOwner()->getLogger()->info(TextFormat::YELLOW . $this->secondsElapsed . " seconds has past.");
	    if($this->secondsElapsed == 5){ //The number is caculated by the seconds you want minus 1
            $this->getOwner()->getServer()->broadcastMessage(TextFormat::GREEN . "YAY!");
        }elseif($this->secondsElapsed >= $this->secsTotal){
		    $this->getOwner()->getServer()->broadcastMessage(TextFormat::DARK_BLUE . "Ending!!!");
		}
    }
}
