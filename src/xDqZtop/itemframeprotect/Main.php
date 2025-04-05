<?php

declare(strict_types=1);

namespace xDqZtop\itemframeprotect;

use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TF::GREEN . "ItemFrameProtect Enabled!");
    }

    public function onInteract(PlayerInteractEvent $event): void {
        $player = $event->getPlayer();
        $block = $event->getBlock();

        if ($block->getTypeId() === VanillaBlocks::ITEM_FRAME()->getTypeId() ||
            $block->getTypeId() === VanillaBlocks::GLOWING_ITEM_FRAME()->getTypeId()) {

            if (!$player->isCreative()) {
                $event->cancel();
            }
        }
    }

    public function onDisable(): void {
        $this->getLogger()->info(TF::RED . "ItemFrameProtect Disabled!");
    }
}