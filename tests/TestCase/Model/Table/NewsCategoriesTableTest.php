<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsCategoriesTable Test Case
 */
class NewsCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsCategoriesTable
     */
    protected $NewsCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NewsCategories',
        'app.News',
        'app.NewsCategoryLanguages',
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
        $config = $this->getTableLocator()->exists('NewsCategories') ? [] : ['className' => NewsCategoriesTable::class];
        $this->NewsCategories = $this->getTableLocator()->get('NewsCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NewsCategories);

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
