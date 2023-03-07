<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Book> $books
 */
?>
<div class="books index content">
    <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Books') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('borrowed') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('release_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('illustration') ?></th>
                    <th><?= $this->Paginator->sort('author') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= h($book->borrowed) ?></td>
                    <td><?= h($book->title) ?></td>
                    <td><?= h($book->release_date) ?></td>
                    <td><?= h($book->created) ?></td>
                    <td><?= h($book->modified) ?></td>
                    <td><?= $this->Html->image("../files/Books/illustration/" . $book->illustration, array('maxwidth'=>"30px")) ?></td>
                    <td><?= $book->has('author') ? $this->Html->link($book->author->lName, ['controller' => 'Authors', 'action' => 'view', $book->author->id]) : '' ?></td>
                    <td><?= $book->has('user') ? $this->Html->link($book->user->email, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->title)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
