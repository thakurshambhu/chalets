<?php
use Migrations\AbstractMigration;

class CreateHeaderFooter extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('header_footer');
        $table->addColumn('header', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('footer', 'text', [
            'default' => null,
            'limit' => 191,
            'null' => false,
        ]);
       
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
