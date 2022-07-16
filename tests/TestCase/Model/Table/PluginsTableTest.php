<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PluginsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PluginsTable Test Case
 */
class PluginsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PluginsTable
     */
    protected $Plugins;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Plugins',
        'app.Products',
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
        $config = $this->getTableLocator()->exists('Plugins') ? [] : ['className' => PluginsTable::class];
        $this->Plugins = $this->getTableLocator()->get('Plugins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Plugins);

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
