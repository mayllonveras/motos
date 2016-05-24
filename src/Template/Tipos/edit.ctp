<?= $this->element('menu'); ?>
<div class="tipos form large-9 medium-8 columns content">
    <?= $this->Form->create($tipo) ?>
    <?= $this->element('menu_interno'); ?>
    <fieldset>
        <legend><?= __('Editar Tipo') ?></legend>
        <?php
            echo $this->Form->input('tipo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
