<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MembersFavoursTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MembersFavoursTable Test Case
 */
class MembersFavoursTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MembersFavoursTable
     */
    protected $MembersFavours;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MembersFavours',
        'app.Members',
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
        $config = $this->getTableLocator()->exists('MembersFavours') ? [] : ['className' => MembersFavoursTable::class];
        $this->MembersFavours = $this->getTableLocator()->get('MembersFavours', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MembersFavours);

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
