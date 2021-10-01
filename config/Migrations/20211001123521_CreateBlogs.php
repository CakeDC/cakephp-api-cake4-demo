<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateBlogs extends AbstractMigration
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
		$this->table('blogs')
			->addColumn('name', 'string')
			->addColumn('description', 'text')
			->addColumn('created', 'datetime')
			->addColumn('modified', 'datetime')
			->create();
    }
}
