<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PluginImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PluginImagesTable Test Case
 */
class PluginImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PluginImagesTable
     */
    protected $PluginImages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PluginImages',
        'app.Plugins',
        'app.ImageTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PluginImages') ? [] : ['className' => PluginImagesTable::class];
        $this->PluginImages = $this->getTableLocator()->get('PluginImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PluginImages);

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
