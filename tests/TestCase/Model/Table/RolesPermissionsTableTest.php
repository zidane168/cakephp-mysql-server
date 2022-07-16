<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesPermissionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolesPermissionsTable Test Case
 */
class RolesPermissionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesPermissionsTable
     */
    protected $RolesPermissions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RolesPermissions',
        'app.Roles',
        'app.Permissions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RolesPermissions') ? [] : ['className' => RolesPermissionsTable::class];
        $this->RolesPermissions = $this->getTableLocator()->get('RolesPermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RolesPermissions);

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
