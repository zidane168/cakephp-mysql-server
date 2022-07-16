<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductViolatesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductViolatesTable Test Case
 */
class ProductViolatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductViolatesTable
     */
    protected $ProductViolates;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductViolates',
        'app.Members',
        'app.Products',
        'app.CreatedBy',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProductViolates') ? [] : ['className' => ProductViolatesTable::class];
        $this->ProductViolates = $this->getTableLocator()->get('ProductViolates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductViolates);

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
