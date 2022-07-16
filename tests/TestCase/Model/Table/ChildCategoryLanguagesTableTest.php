<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChildCategoryLanguagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChildCategoryLanguagesTable Test Case
 */
class ChildCategoryLanguagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChildCategoryLanguagesTable
     */
    protected $ChildCategoryLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ChildCategoryLanguages',
        'app.ChildCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ChildCategoryLanguages') ? [] : ['className' => ChildCategoryLanguagesTable::class];
        $this->ChildCategoryLanguages = $this->getTableLocator()->get('ChildCategoryLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ChildCategoryLanguages);

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
