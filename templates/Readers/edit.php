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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reader->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reader->fname . " " . $reader->lname), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Readers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="readers form content">
            <?= $this->Form->create($reader) ?>
            <fieldset>
                <legend><?= __('Edit Reader') ?></legend>
                <?php
                    echo $this->Form->control('fname');
                    echo $this->Form->control('lname');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
