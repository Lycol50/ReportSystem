<?php

namespace ImNotYourDev\Report\commands;

use ImNotYourDev\Report\forms\ReportListForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class ReportListCommand extends Command
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender->hasPermission("reportsystem.admin") || $sender->hasPermission("reportsystem.list")){
            if($sender instanceof Player){
                $sender->sendForm(new ReportListForm()); // idk if forms is implemented.
            }
        }
        return false;
    }
}
