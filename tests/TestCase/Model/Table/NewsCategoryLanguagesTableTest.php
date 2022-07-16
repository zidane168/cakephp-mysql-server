<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsCategoryLanguagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsCategoryLanguagesTable Test Case
 */
class NewsCategoryLanguagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsCategoryLanguagesTable
     */
    protected $NewsCategoryLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NewsCategoryLanguages',
        'app.NewsCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NewsCategoryLanguages') ? [] : ['className' => NewsCategoryLanguagesTable::class];
        $this->NewsCategoryLanguages = $this->getTableLocator()->get('NewsCategoryLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NewsCategoryLanguages);

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
