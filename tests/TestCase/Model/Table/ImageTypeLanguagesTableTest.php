<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImageTypeLanguagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImageTypeLanguagesTable Test Case
 */
class ImageTypeLanguagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImageTypeLanguagesTable
     */
    protected $ImageTypeLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ImageTypeLanguages',
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
        $config = $this->getTableLocator()->exists('ImageTypeLanguages') ? [] : ['className' => ImageTypeLanguagesTable::class];
        $this->ImageTypeLanguages = $this->getTableLocator()->get('ImageTypeLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ImageTypeLanguages);

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
