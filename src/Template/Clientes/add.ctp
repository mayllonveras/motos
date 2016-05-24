<?= $this->element('menu'); ?>
<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Novo Cliente') ?></legend>
        <?= $this->element('menu_interno'); ?>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('fone');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
