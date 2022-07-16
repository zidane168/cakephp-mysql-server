<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogApisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogApisTable Test Case
 */
class LogApisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LogApisTable
     */
    protected $LogApis;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LogApis',
        'app.Companies',
        'app.Members',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LogApis') ? [] : ['className' => LogApisTable::class];
        $this->LogApis = $this->getTableLocator()->get('LogApis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LogApis);

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
