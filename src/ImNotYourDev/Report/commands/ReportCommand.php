<?php

namespace ImNotYourDev\Report\commands;

use ImNotYourDev\Report\forms\AdminForm;
use ImNotYourDev\Report\forms\PlayerReportForm;
use ImNotYourDev\Report\forms\ReportListForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class ReportCommand extends Command
{

    /**
     * ReportCommand constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $desc = "Send a report";
        parent::__construct($name, $desc);

    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return bool|mixed
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
                $sender->sendForm(new PlayerReportForm()); // idk if forms is implemented.
            switch ($args) {
                case "admin":
                    if ($sender->hasPermission("report.admin")) {
                        $sender->sendForm(new AdminForm()); // idk if forms is implemented.
                    }
                    break;
                case "list":
                    if ($sender->hasPermission("report.admin") || $sender->hasPermission("report.list")) {
                        $sender->sendForm(new ReportListForm());
                    }
                    break;
            }
        }
        return false;
    }
}
