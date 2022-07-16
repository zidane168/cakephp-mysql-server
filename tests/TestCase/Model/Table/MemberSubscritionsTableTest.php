<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MemberSubscritionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MemberSubscritionsTable Test Case
 */
class MemberSubscritionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MemberSubscritionsTable
     */
    protected $MemberSubscritions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MemberSubscritions',
        'app.Members',
        'app.Prodcuts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MemberSubscritions') ? [] : ['className' => MemberSubscritionsTable::class];
        $this->MemberSubscritions = $this->getTableLocator()->get('MemberSubscritions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MemberSubscritions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
