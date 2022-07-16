<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CitysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CitysTable Test Case
 */
class CitysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CitysTable
     */
    protected $Citys;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Citys',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Citys') ? [] : ['className' => CitysTable::class];
        $this->Citys = $this->getTableLocator()->get('Citys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Citys);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CitysTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
