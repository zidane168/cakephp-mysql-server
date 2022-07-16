<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourseImagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourseImagesTable Test Case
 */
class CourseImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CourseImagesTable
     */
    protected $CourseImages;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CourseImages',
        'app.ImageTypes',
        'app.Courses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CourseImages') ? [] : ['className' => CourseImagesTable::class];
        $this->CourseImages = $this->getTableLocator()->get('CourseImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CourseImages);

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
