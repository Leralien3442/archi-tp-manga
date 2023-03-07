<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Borrow Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $begin_date
 * @property \Cake\I18n\FrozenDate|null $end_date
 * @property int|null $reader_id
 * @property int|null $book_id
 *
 * @property \App\Model\Entity\Reader $reader
 * @property \App\Model\Entity\Book $book
 */
class Borrow extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'begin_date' => true,
        'end_date' => true,
        'reader_id' => true,
        'book_id' => true,
        'reader' => true,
        'book' => true,
    ];
}
