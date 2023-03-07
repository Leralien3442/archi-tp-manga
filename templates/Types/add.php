<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 * @var \Cake\Collection\CollectionInterface|string[] $books
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="types form content">
            <?= $this->Form->create($type) ?>
            <fieldset>
                <legend><?= __('Add Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('books._ids', ['options' => $books]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
