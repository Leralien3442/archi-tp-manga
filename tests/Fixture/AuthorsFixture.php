<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuthorsFixture
 */
class AuthorsFixture extends TestFixture
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
                'fName' => 'Lorem ipsum dolor sit amet',
                'lName' => 'Lorem ipsum dolor sit amet',
                'DOB' => '2023-03-02',
                'country' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
