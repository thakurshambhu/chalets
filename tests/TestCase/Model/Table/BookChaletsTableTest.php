<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookChaletsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookChaletsTable Test Case
 */
class BookChaletsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookChaletsTable
     */
    public $BookChalets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BookChalets',
        'app.Chalets',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BookChalets') ? [] : ['className' => BookChaletsTable::class];
        $this->BookChalets = TableRegistry::getTableLocator()->get('BookChalets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BookChalets);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
