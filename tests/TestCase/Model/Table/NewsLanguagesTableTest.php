<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsLanguagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsLanguagesTable Test Case
 */
class NewsLanguagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsLanguagesTable
     */
    protected $NewsLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.NewsLanguages',
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
        $config = $this->getTableLocator()->exists('NewsLanguages') ? [] : ['className' => NewsLanguagesTable::class];
        $this->NewsLanguages = $this->getTableLocator()->get('NewsLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->NewsLanguages);

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
