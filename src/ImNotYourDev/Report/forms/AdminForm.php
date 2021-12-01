<?php

namespace ImNotYourDev\Report\forms;

use ImNotYourDev\Report\libs\dktapps\pmforms\MenuOption;
use ImNotYourDev\Report\libs\dktapps\pmforms\MenuForm;
use ImNotYourDev\Report\Report;
use pocketmine\player\Player;

class AdminForm extends MenuForm
{
    public function __construct()
    {
        $title = "§6ReportSystem §7>§f Admin";
        $text = "ReportSystem Admin Tools";
        $options = [
            new MenuOption("§cReport List"),
            new MenuOption("§7Recycle Bin"),
            //new MenuOption("§aExit")
        ];
        parent::__construct($title, $text, $options, function (Player $player, $data) : void {
            if($data == 0){
                $player->sendForm(new ReportListForm()); // idk if forms is implemented.
            }elseif($data == 1){
                $player->sendForm(new RecycleBinForm()); // idk if forms is implemented.
            }else{
                //$player->removeAllWindows(); // Might not be compatible to API4 as of now..
                return;
            }
            return;
        });
    }
}