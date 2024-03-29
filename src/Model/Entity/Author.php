<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Author Entity
 *
 * @property int $id
 * @property string|null $fName
 * @property string|null $lName
 * @property \Cake\I18n\FrozenDate|null $DOB
 * @property string|null $country
 *
 * @property \App\Model\Entity\Book[] $books
 */
class Author extends Entity
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
        'fName' => true,
        'lName' => true,
        'DOB' => true,
        'country' => true,
        'books' => true,
    ];
}
