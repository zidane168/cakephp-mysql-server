<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsTable Test Case
 */
class NewsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsTable
     */
    protected $News;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.News',
        'app.NewsCategories',
        'app.NewsImages',
        'app.Languages',
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
        $config = $this->getTableLocator()->exists('News') ? [] : ['className' => NewsTable::class];
        $this->News = $this->getTableLocator()->get('News', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->News);

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
