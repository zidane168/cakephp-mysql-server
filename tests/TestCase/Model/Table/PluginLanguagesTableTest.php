<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PluginLanguagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PluginLanguagesTable Test Case
 */
class PluginLanguagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PluginLanguagesTable
     */
    protected $PluginLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PluginLanguages',
        'app.Labels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PluginLanguages') ? [] : ['className' => PluginLanguagesTable::class];
        $this->PluginLanguages = $this->getTableLocator()->get('PluginLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PluginLanguages);

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
