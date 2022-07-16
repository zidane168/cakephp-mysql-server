<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdministratorsRolesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdministratorsRolesTable Test Case
 */
class AdministratorsRolesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdministratorsRolesTable
     */
    protected $AdministratorsRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AdministratorsRoles',
        'app.Administrators',
        'app.Roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AdministratorsRoles') ? [] : ['className' => AdministratorsRolesTable::class];
        $this->AdministratorsRoles = $this->getTableLocator()->get('AdministratorsRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AdministratorsRoles);

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
