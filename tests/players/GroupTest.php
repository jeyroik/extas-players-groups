<?php
namespace tests\players;

use Dotenv\Dotenv;
use extas\components\extensions\Extension;
use extas\components\extensions\ExtensionPlayerGroup;
use extas\components\players\Player;
use extas\components\players\PlayerGroup;
use extas\components\repositories\TSnuffRepositoryDynamic;
use extas\components\THasMagicClass;
use extas\interfaces\extensions\IExtensionPlayerGroup;
use extas\interfaces\samples\parameters\ISampleParameter;
use PHPUnit\Framework\TestCase;

/**
 * Class GroupTest
 *
 * @package tests\players
 * @author jeyroik <jeyroik@gmail.com>
 */
class GroupTest extends TestCase
{
    use TSnuffRepositoryDynamic;
    use THasMagicClass;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->createSnuffDynamicRepositories([
            ['players', 'name', Player::class]
        ]);

    }

    public function tearDown(): void
    {
        $this->deleteSnuffDynamicRepositories();
    }

    public function testBasicMethods()
    {
        $group = new PlayerGroup();
        $group->setCreatorName('test');
        $this->assertEquals('test', $group->getCreatorName());

        $group->setCreatedAt(1);
        $this->assertEquals(1, $group->getCreatedAt());

        $group->setPrivate(true);
        $this->assertTrue($group->isPrivate());

        $group->setMembersCount(1);
        $this->assertEquals(1, $group->getMembersCount());

        $group->incMembersCount(2);
        $this->assertEquals(3, $group->getMembersCount());

        $this->assertTrue($group->isValid());
    }

    public function testExtension()
    {
        $this->createWithSnuffRepo('extensionRepository', new Extension([
            Extension::FIELD__CLASS => ExtensionPlayerGroup::class,
            Extension::FIELD__SUBJECT => 'extas.player',
            Extension::FIELD__METHODS => ['isGroup', '__toGroup'],
            Extension::FIELD__INTERFACE => IExtensionPlayerGroup::class
        ]));

        /**
         * @var Player|IExtensionPlayerGroup $player
         */
        $player = new Player([
            Player::FIELD__PARAMETERS => [
                PlayerGroup::PARAM__CREATOR_NAME => [
                    ISampleParameter::FIELD__NAME => PlayerGroup::PARAM__CREATOR_NAME,
                    ISampleParameter::FIELD__VALUE => 'test'
                ],
                PlayerGroup::PARAM__CREATED_AT => [
                    ISampleParameter::FIELD__NAME => PlayerGroup::PARAM__CREATED_AT,
                    ISampleParameter::FIELD__VALUE => time()
                ]
            ]
        ]);

        $this->assertTrue($player->isGroup());
        $this->assertEquals('test', $player->__toGroup()->getCreatorName());
    }
}
