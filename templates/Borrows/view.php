<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Borrow $borrow
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Borrow'), ['action' => 'edit', $borrow->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Borrow'), ['action' => 'delete', $borrow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $borrow->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Borrows'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Borrow'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="borrows view content">
            <h3><?= h($borrow->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Reader') ?></th>
                    <td><?= $borrow->has('reader') ? $this->Html->link($borrow->reader->lname . " " . $borrow->reader->fname, ['controller' => 'Readers', 'action' => 'view', $borrow->reader->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Book') ?></th>
                    <td><?= $borrow->has('book') ? $this->Html->link($borrow->book->title, ['controller' => 'Books', 'action' => 'view', $borrow->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($borrow->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Begin Date') ?></th>
                    <td><?= h($borrow->begin_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($borrow->end_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
