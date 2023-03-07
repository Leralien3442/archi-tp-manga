<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books view content">
            <h3><?= h($book->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($book->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Illustration') ?></th>
                    <td><?= $this->Html->image("../files/Books/illustration/" . $book->illustration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Author') ?></th>
                    <td><?= $book->has('author') ? $this->Html->link($book->author->lName, ['controller' => 'Authors', 'action' => 'view', $book->author->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $book->has('user') ? $this->Html->link($book->user->email, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Release Date') ?></th>
                    <td><?= h($book->release_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($book->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($book->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Borrowed') ?></th>
                    <td><?= $book->borrowed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Summary') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($book->summary)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Opinion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($book->opinion)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Types') ?></h4>
                <?php if (!empty($book->types)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->types as $types) : ?>
                        <tr>
                            <td><?= h($types->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Types', 'action' => 'view', $types->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Types', 'action' => 'edit', $types->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Types', 'action' => 'delete', $types->id], ['confirm' => __('Are you sure you want to delete # {0}?', $types->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Borrows') ?></h4>
                <?php if (!empty($book->borrows)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Begin Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Reader') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->borrows as $borrows) : ?>
                        <tr>
                            <td><?= h($borrows->begin_date) ?></td>
                            <td><?= h($borrows->end_date) ?></td>
                            <td><?= h($borrows->reader->lname . " ". $borrows->reader->fname) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Borrows', 'action' => 'view', $borrows->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Borrows', 'action' => 'edit', $borrows->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Borrows', 'action' => 'delete', $borrows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->title)]) ?>
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
