<?php

namespace ImNotYourDev\Report\commands;

use ImNotYourDev\Report\forms\AdminForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class AdminCommand extends Command
{
    public function __construct(string $name)
    {
        $this->setPermission("reportsystem.admin");
        parent::__construct($name);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender->hasPermission("reportsystem.admin")){
            if($sender instanceof Player){
                $sender->sendForm(new AdminForm());
            }
        }
        return false;
    }
}
