<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistrictsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistrictsTable Test Case
 */
class DistrictsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DistrictsTable
     */
    protected $Districts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Districts',
        'app.Regions',
        'app.DistrictLanguages',
        'app.ParkingRequirements',
        'app.Products',
        'app.Subdistricts',
        'app.Transactions',
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
        $config = $this->getTableLocator()->exists('Districts') ? [] : ['className' => DistrictsTable::class];
        $this->Districts = $this->getTableLocator()->get('Districts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Districts);

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
