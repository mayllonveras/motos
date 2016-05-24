<?= $this->element('menu'); ?>
<div class="negocios form large-9 medium-8 columns content">
    <?= $this->Form->create($negocio) ?>
    
    <fieldset>
        <legend><?= __('Editar Negocio') ?></legend>
        <?php
            echo $this->Form->input('cliente_id', ['options' => $clientes]);
            echo $this->Form->input('moto_id', ['options' => $motos]);
            echo $this->Form->input('data');
            echo $this->Form->input('tipo');
            echo $this->Form->input('valor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
