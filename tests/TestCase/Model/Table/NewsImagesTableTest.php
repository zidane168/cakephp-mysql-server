<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsImagesTable Test Case
 */
class NewsImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsImagesTable
     */
    protected $NewsImages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NewsImages',
        'app.News',
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
        $config = $this->getTableLocator()->exists('NewsImages') ? [] : ['className' => NewsImagesTable::class];
        $this->NewsImages = $this->getTableLocator()->get('NewsImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NewsImages);

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
