<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 * @var string[]|\Cake\Collection\CollectionInterface $authors
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $types
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $book->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $book->title), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books form content">
            <?= $this->Form->create($book, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Book') ?></legend>
                <?php
                    echo $this->Form->control('borrowed');
                    echo $this->Form->control('title');
                    echo $this->Form->control('release_date', ['empty' => true]);
                    echo $this->Form->control('summary');
                    echo $this->Form->control('opinion');
                    echo $this->Form->control('illustration', ['type' => 'file']);
                    echo $this->Form->input('author.id', ["type" => "select", 'options' => $authors, 'empty' => true]);
                    echo $this->Form->control('types._ids', ['options' => $types, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
