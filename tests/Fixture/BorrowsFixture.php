<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BorrowsFixture
 */
class BorrowsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'begin_date' => '2023-03-02',
                'end_date' => '2023-03-02',
                'reader_id' => 1,
                'book_id' => 1,
            ],
        ];
        parent::init();
    }
}
