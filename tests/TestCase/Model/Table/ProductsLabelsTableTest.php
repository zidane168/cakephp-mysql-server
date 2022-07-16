<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsLabelsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsLabelsTable Test Case
 */
class ProductsLabelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsLabelsTable
     */
    protected $ProductsLabels;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductsLabels',
        'app.Products',
        'app.Labels',
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
        $config = $this->getTableLocator()->exists('ProductsLabels') ? [] : ['className' => ProductsLabelsTable::class];
        $this->ProductsLabels = $this->getTableLocator()->get('ProductsLabels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductsLabels);

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
