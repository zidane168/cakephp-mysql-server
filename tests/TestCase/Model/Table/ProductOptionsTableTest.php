<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductOptionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductOptionsTable Test Case
 */
class ProductOptionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductOptionsTable
     */
    protected $ProductOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductOptions',
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
        $config = $this->getTableLocator()->exists('ProductOptions') ? [] : ['className' => ProductOptionsTable::class];
        $this->ProductOptions = $this->getTableLocator()->get('ProductOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductOptions);

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
