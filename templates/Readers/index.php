<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reader> $readers
 */
?>
<div class="readers index content">
    <?= $this->Html->link(__('New Reader'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Readers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fname') ?></th>
                    <th><?= $this->Paginator->sort('lname') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($readers as $reader): ?>
                <tr>
                    <td><?= $this->Number->format($reader->id) ?></td>
                    <td><?= h($reader->fname) ?></td>
                    <td><?= h($reader->lname) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reader->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reader->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reader->id)]) ?>
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
