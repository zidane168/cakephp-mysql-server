<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsTypeLanguagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsTypeLanguagesTable Test Case
 */
class NewsTypeLanguagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsTypeLanguagesTable
     */
    protected $NewsTypeLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NewsTypeLanguages',
        'app.News',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NewsTypeLanguages') ? [] : ['className' => NewsTypeLanguagesTable::class];
        $this->NewsTypeLanguages = $this->getTableLocator()->get('NewsTypeLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NewsTypeLanguages);

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
