<?php
namespace extas\interfaces\players;

/**
 * Interface IPlayerGroup
 *
 * @package extas\interfaces\players
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IPlayerGroup extends IPlayerSample
{
    public const SUBJECT = 'extas.player.group';

    public const PARAM__IS_PRIVATE = 'is_private';
    public const PARAM__CREATOR_NAME = 'creator_name';
    public const PARAM__CREATED_AT = 'created_at';
    public const PARAM__MEMBERS_COUNT = 'members_count';

    /**
     * @return bool
     */
    public function isPrivate(): bool;

    /**
     * @return string
     */
    public function getCreatorName(): string;

    /**
     * @return int
     */
    public function getCreatedAt(): int;

    /**
     * @return int
     */
    public function getMembersCount(): int;

    /**
     * @param bool $isPrivate
     * @return IPlayerGroup
     */
    public function setPrivate(bool $isPrivate): IPlayerGroup;

    /**
     * @param string $name
     * @return IPlayerGroup
     */
    public function setCreatorName(string $name): IPlayerGroup;

    /**
     * @param int $createdAt
     * @return IPlayerGroup
     */
    public function setCreatedAt(int $createdAt): IPlayerGroup;

    /**
     * @param int $count
     * @return IPlayerGroup
     */
    public function setMembersCount(int $count): IPlayerGroup;

    /**
     * @param int $inc
     * @return int
     */
    public function incMembersCount(int $inc): int;

    /**
     * @return bool
     */
    public function isValid(): bool;
}
