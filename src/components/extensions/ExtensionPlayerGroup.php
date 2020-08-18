<?php
namespace extas\components\extensions;

use extas\components\players\PlayerGroup;
use extas\interfaces\extensions\IExtensionPlayerGroup;
use extas\interfaces\players\IPlayer;
use extas\interfaces\players\IPlayerGroup;

/**
 * Class ExtensionPlayerGroup
 *
 * @package extas\components\extensions
 * @author jeyroik <jeyroik@gmail.com>
 */
class ExtensionPlayerGroup extends Extension implements IExtensionPlayerGroup
{
    /**
     * @param IPlayer|null $player
     * @return IPlayerGroup
     */
    public function __toGroup(IPlayer $player = null): IPlayerGroup
    {
        return new PlayerGroup($player->__toArray());
    }

    /**
     * @param IPlayer|null $player
     * @return bool
     */
    public function isGroup(IPlayer $player = null): bool
    {
        $group = $this->__toGroup($player);

        return $group->isValid();
    }
}
