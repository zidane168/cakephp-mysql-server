<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MemberImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MemberImagesTable Test Case
 */
class MemberImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MemberImagesTable
     */
    protected $MemberImages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MemberImages',
        'app.Members',
        'app.ImageTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MemberImages') ? [] : ['className' => MemberImagesTable::class];
        $this->MemberImages = $this->getTableLocator()->get('MemberImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MemberImages);

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
