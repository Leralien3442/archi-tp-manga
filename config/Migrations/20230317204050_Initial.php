<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public $autoId = false;

    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('authors')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('fName', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('lName', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('DOB', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('country', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->create();

        $this->table('books')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('borrowed', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('release_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('summary', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('opinion', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('illustration', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('author_id', 'biginteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('user_id', 'biginteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'author_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('books_types')
            ->addColumn('type_id', 'biginteger', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('book_id', 'biginteger', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['type_id', 'book_id'])
            ->addIndex(
                [
                    'book_id',
                ]
            )
            ->addIndex(
                [
                    'type_id',
                ]
            )
            ->create();

        $this->table('borrows')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('begin_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('end_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('reader_id', 'biginteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('book_id', 'biginteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'book_id',
                ]
            )
            ->addIndex(
                [
                    'reader_id',
                ]
            )
            ->create();

        $this->table('readers')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('fname', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('lname', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->create();

        $this->table('types')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('books')
            ->addForeignKey(
                'author_id',
                'authors',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'SET_NULL',
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'SET_NULL',
                ]
            )
            ->update();

        $this->table('books_types')
            ->addForeignKey(
                'book_id',
                'books',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'type_id',
                'types',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('borrows')
            ->addForeignKey(
                'book_id',
                'books',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'reader_id',
                'readers',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('books')
            ->dropForeignKey(
                'author_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('books_types')
            ->dropForeignKey(
                'book_id'
            )
            ->dropForeignKey(
                'type_id'
            )->save();

        $this->table('borrows')
            ->dropForeignKey(
                'book_id'
            )
            ->dropForeignKey(
                'reader_id'
            )->save();

        $this->table('authors')->drop()->save();
        $this->table('books')->drop()->save();
        $this->table('books_types')->drop()->save();
        $this->table('borrows')->drop()->save();
        $this->table('readers')->drop()->save();
        $this->table('types')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
