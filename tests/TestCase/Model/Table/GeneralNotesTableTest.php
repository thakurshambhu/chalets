<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeneralNotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeneralNotesTable Test Case
 */
class GeneralNotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GeneralNotesTable
     */
    public $GeneralNotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GeneralNotes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GeneralNotes') ? [] : ['className' => GeneralNotesTable::class];
        $this->GeneralNotes = TableRegistry::getTableLocator()->get('GeneralNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GeneralNotes);

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
