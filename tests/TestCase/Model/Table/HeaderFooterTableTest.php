<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HeaderFooterTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HeaderFooterTable Test Case
 */
class HeaderFooterTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HeaderFooterTable
     */
    public $HeaderFooter;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.HeaderFooter',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HeaderFooter') ? [] : ['className' => HeaderFooterTable::class];
        $this->HeaderFooter = TableRegistry::getTableLocator()->get('HeaderFooter', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HeaderFooter);

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
