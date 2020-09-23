<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChaletsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChaletsTable Test Case
 */
class ChaletsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChaletsTable
     */
    public $Chalets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Chalets',
        'app.BookChalets',
        'app.Details',
        'app.Images',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Chalets') ? [] : ['className' => ChaletsTable::class];
        $this->Chalets = TableRegistry::getTableLocator()->get('Chalets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Chalets);

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
