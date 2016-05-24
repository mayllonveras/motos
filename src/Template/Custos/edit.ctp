<?= $this->element('menu'); ?>
<div class="custos form large-9 medium-8 columns content">
    <?= $this->Form->create($custo) ?>
    <fieldset>
        <legend><?= __('Editar Custo') ?></legend>
        <?= $this->element('menu_interno'); ?>
        <?php
            echo $this->Form->input('tipo_id', ['options' => $tipos]);
            echo $this->Form->input('negocio_id', ['options' => $negocios]);
            echo $this->Form->input('valor');
            echo $this->Form->input('observação');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
