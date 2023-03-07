<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property bool|null $borrowed
 * @property string|null $title
 * @property \Cake\I18n\FrozenDate|null $release_date
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $summary
 * @property string|null $opinion
 * @property string|null $illustration
 * @property int|null $author_id
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\Author $author
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Borrow[] $borrows
 * @property \App\Model\Entity\Type[] $types
 */
class Book extends Entity
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
        'borrowed' => true,
        'title' => true,
        'release_date' => true,
        'created' => true,
        'modified' => true,
        'summary' => true,
        'opinion' => true,
        'illustration' => true,
        'author_id' => true,
        'user_id' => true,
        'author' => true,
        'user' => true,
        'borrows' => true,
        'types' => true,
    ];
}
