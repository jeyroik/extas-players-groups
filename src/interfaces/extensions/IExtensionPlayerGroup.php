<?php
namespace extas\interfaces\extensions;

use extas\interfaces\players\IPlayerGroup;

/**
 * Interface IExtensionPlayerGroup
 *
 * @package extas\interfaces\extensions
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IExtensionPlayerGroup
{
    /**
     * @return IPlayerGroup
     */
    public function __toGroup(): IPlayerGroup;

    /**
     * @return bool
     */
    public function isGroup(): bool;
}
