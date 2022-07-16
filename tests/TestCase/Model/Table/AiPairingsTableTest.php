<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AiPairingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AiPairingsTable Test Case
 */
class AiPairingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AiPairingsTable
     */
    protected $AiPairings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AiPairings',
        'app.Regions',
        'app.Districts',
        'app.Subdistricts',
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
        $config = $this->getTableLocator()->exists('AiPairings') ? [] : ['className' => AiPairingsTable::class];
        $this->AiPairings = $this->getTableLocator()->get('AiPairings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AiPairings);

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
