<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsTypesTable Test Case
 */
class NewsTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsTypesTable
     */
    protected $NewsTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NewsTypes',
        'app.News',
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
        $config = $this->getTableLocator()->exists('NewsTypes') ? [] : ['className' => NewsTypesTable::class];
        $this->NewsTypes = $this->getTableLocator()->get('NewsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NewsTypes);

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
