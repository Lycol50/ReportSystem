<?php

namespace ImNotYourDev\Report\commands;

use ImNotYourDev\Report\forms\AdminForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;

class AdminCommand extends Command
{
    public function __construct(string $name)
    {
        $this->setPermission("report.admin");
        parent::__construct($name);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender->hasPermission("report.admin")){
            if($sender instanceof Player){
                $sender->sendForm(new AdminForm()); // idk if forms is implemented.
            }
        }
        return false;
    }
}
