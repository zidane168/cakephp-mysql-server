<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubdistrictsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubdistrictsTable Test Case
 */
class SubdistrictsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubdistrictsTable
     */
    protected $Subdistricts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Subdistricts',
        'app.Districts',
        'app.ParkingRequirements',
        'app.Products',
        'app.SubdistrictLanguages',
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
        $config = $this->getTableLocator()->exists('Subdistricts') ? [] : ['className' => SubdistrictsTable::class];
        $this->Subdistricts = $this->getTableLocator()->get('Subdistricts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Subdistricts);

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
