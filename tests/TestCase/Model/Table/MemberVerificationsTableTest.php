<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MemberVerificationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MemberVerificationsTable Test Case
 */
class MemberVerificationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MemberVerificationsTable
     */
    protected $MemberVerifications;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MemberVerifications',
        'app.Members',
        'app.CreatedBy',
        'app.ModifiedBy',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MemberVerifications') ? [] : ['className' => MemberVerificationsTable::class];
        $this->MemberVerifications = $this->getTableLocator()->get('MemberVerifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MemberVerifications);

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
