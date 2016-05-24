<?= $this->element('menu'); ?>
<div class="custos form large-9 medium-8 columns content">
    <?= $this->Form->create($custo)  ?>
    <fieldset>
        <legend><?= 'Novo Custo: Negócio '.$_GET['n'] ?></legend>
        
        <?php
            echo $this->Form->input('tipo_id', ['options' => $tipos]);
            echo $this->Form->input('negocio_id', ['type' => 'hidden', 'value' => $_GET['n']]);
            echo $this->Form->input('valor');
            echo $this->Form->input('observação');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
