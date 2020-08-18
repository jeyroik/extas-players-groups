<?php
namespace extas\components\players;

use extas\interfaces\players\IPlayerGroup;

/**
 * Class PlayerGroup
 *
 * @package extas\components\players
 * @author jeyroik <jeyroik@gmail.com>
 */
class PlayerGroup extends PlayerSample implements IPlayerGroup
{
    /**
     * @return string
     */
    public function getCreatorName(): string
    {
        return $this->getParameterValue(static::PARAM__CREATOR_NAME, '');
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->getParameterValue(static::PARAM__CREATED_AT, 0);
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return $this->getParameterValue(static::PARAM__IS_PRIVATE, true);
    }

    /**
     * @return int
     */
    public function getMembersCount(): int
    {
        return $this->getParameterValue(static::PARAM__MEMBERS_COUNT, 0);
    }

    /**
     * @param bool $isPrivate
     * @return $this|IPlayerGroup
     * @throws \Exception
     */
    public function setPrivate(bool $isPrivate): IPlayerGroup
    {
        $this->hasParameter(static::PARAM__IS_PRIVATE)
            ? $this->setParameterValue(static::PARAM__IS_PRIVATE, $isPrivate)
            : $this->addParameterByValue(static::PARAM__IS_PRIVATE, $isPrivate);

        return $this;
    }

    public function setCreatorName(string $name): IPlayerGroup
    {
        $this->hasParameter(static::PARAM__CREATOR_NAME)
            ? $this->setParameterValue(static::PARAM__CREATOR_NAME, $name)
            : $this->addParameterByValue(static::PARAM__CREATOR_NAME, $name);

        return $this;
    }

    /**
     * @param int $createdAt
     * @return $this|IPlayerGroup
     * @throws \Exception
     */
    public function setCreatedAt(int $createdAt): IPlayerGroup
    {
        $this->hasParameter(static::PARAM__CREATED_AT)
            ? $this->setParameterValue(static::PARAM__CREATED_AT, $createdAt)
            : $this->addParameterByValue(static::PARAM__CREATED_AT, $createdAt);

        return $this;
    }

    /**
     * @param int $count
     * @return $this|IPlayerGroup
     * @throws \Exception
     */
    public function setMembersCount(int $count): IPlayerGroup
    {
        $this->hasParameter(static::PARAM__MEMBERS_COUNT)
            ? $this->setParameterValue(static::PARAM__MEMBERS_COUNT, $count)
            : $this->addParameterByValue(static::PARAM__MEMBERS_COUNT, $count);

        return $this;
    }

    /**
     * @param int $inc
     * @return int
     * @throws \Exception
     */
    public function incMembersCount(int $inc): int
    {
        $this->setMembersCount($this->getMembersCount() + $inc);

        return $this->getMembersCount();
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->getCreatorName() && $this->getCreatedAt();
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
