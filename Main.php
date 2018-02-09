<?php

namespace DropDownUI;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;
use pocketmine\event\server\DataPacketReceiveEvent;
class Main extends PluginBase implements Listener {
	
	
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		
        $this->getLogger()->info("§aDropDownUI");
    }
	
    public function onDisable() {
        $this->getLogger()->info("§aDropDownUI");
    }
   
	public function dropdownui() {
        $text = [
            "type" => "custom_form",
            "title" => §b[ §aUI§b ],
			"content" => [
				[ 
				    "type" => "dropdown",
        "text" => $sender
					   "text" => "§d[ §aDropDownUI§d ]" 
				]				
				]			
            ];
		return json_encode ( $text );
	}

  public function ui (DataPacketReceiveEvent $event) {
		$p = $event->getPacket ();
		$player = $event->getPlayer ();
		if ($p instanceof ModalFormResponsePacket and $p->formId == 3216 ) {
			$name = json_decode ( $p->formData, true );
     }
  }     
     
    public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args) : bool {
		
		switch($cmd->getName()){
		
			case "dropui":			    
				if($sender instanceof Player) {
    $p = new ModalFormRequestPacket ();
				$p->formId = 2222;
				$p->formData = $this->dropdownui();
				$sender->dataPacket ($p);
				return true;					 					      
						
						}
				}
				else{
				}
			break;
		}
		return true;
    }
	
	
	
}
