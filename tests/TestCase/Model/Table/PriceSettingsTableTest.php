<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PriceSettingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PriceSettingsTable Test Case
 */
class PriceSettingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PriceSettingsTable
     */
    protected $PriceSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PriceSettings',
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
        $config = $this->getTableLocator()->exists('PriceSettings') ? [] : ['className' => PriceSettingsTable::class];
        $this->PriceSettings = $this->getTableLocator()->get('PriceSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PriceSettings);

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
}
