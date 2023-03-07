<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reader $reader
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reader'), ['action' => 'edit', $reader->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reader'), ['action' => 'delete', $reader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reader->fname . " " . $reader->lname), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Readers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reader'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="readers view content">
            <h3><?= h($reader->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fname') ?></th>
                    <td><?= h($reader->fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lname') ?></th>
                    <td><?= h($reader->lname) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Borrows') ?></h4>
                <?php if (!empty($reader->borrows)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Begin Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Book') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($reader->borrows as $borrows) : ?>
                        <tr>
                            <td><?= h($borrows->id) ?></td>
                            <td><?= h($borrows->begin_date) ?></td>
                            <td><?= h($borrows->end_date) ?></td>
                            <td><?= h($borrows->book->title) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Borrows', 'action' => 'view', $borrows->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Borrows', 'action' => 'edit', $borrows->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Borrows', 'action' => 'delete', $borrows->id], ['confirm' => __('Are you sure you want to delete this association ?')]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
