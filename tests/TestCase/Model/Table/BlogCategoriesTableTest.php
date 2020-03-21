<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlogCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlogCategoriesTable Test Case
 */
class BlogCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BlogCategoriesTable
     */
    public $BlogCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BlogCategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BlogCategories') ? [] : ['className' => BlogCategoriesTable::class];
        $this->BlogCategories = TableRegistry::getTableLocator()->get('BlogCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BlogCategories);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
