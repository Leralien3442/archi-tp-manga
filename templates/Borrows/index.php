<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Borrow> $borrows
 */
?>
<div class="borrows index content">
    <?= $this->Html->link(__('New Borrow'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Borrows') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('begin_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('reader') ?></th>
                    <th><?= $this->Paginator->sort('book') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($borrows as $borrow): ?>
                    <tr>
                    <td><?= $this->Number->format($borrow->id) ?></td>
                    <td><?= h($borrow->begin_date) ?></td>
                    <td><?= h($borrow->end_date) ?></td>
                    <td><?= $borrow->has('reader') ? $this->Html->link($borrow->reader->lname . " " . $borrow->reader->fname, ['controller' => 'Readers', 'action' => 'view', $borrow->reader->id]) : '' ?></td>
                    <td><?= $borrow->has('book') ? $this->Html->link($borrow->book->title, ['controller' => 'Books', 'action' => 'view', $borrow->book->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $borrow->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $borrow->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $borrow->id], ['confirm' => __('Are you sure you want to delete this association ?')]) ?>
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
