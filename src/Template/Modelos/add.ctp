<?= $this->element('menu'); ?>
<div class="modelos form large-9 medium-8 columns content">
            
<?= $this->Form->create($modelo) ?>
    <fieldset>        
        <legend><?= __('Novo Modelo') ?></legend>
        <?= $this->element('menu_interno'); ?>
        <?php
            echo $this->Form->input('marca_id', ['options' => $marcas]);
            echo $this->Form->input('modelo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
