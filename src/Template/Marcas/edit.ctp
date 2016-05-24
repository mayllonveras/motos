<?= $this->element('menu'); ?>

<div class="marcas form large-9 medium-8 columns content">
    <?= $this->Form->create($marca) ?>
    <fieldset>
        <legend><?= __('Editar Marca') ?></legend>
        <?= $this->element('menu_interno'); ?>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
