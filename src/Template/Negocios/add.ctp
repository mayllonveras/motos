<?= $this->element('menu'); ?>
<div class="negocios form large-9 medium-8 columns content">
    <?= $this->Form->create($negocio, ['class' => 'medium-10']) ?>
    <fieldset>
        <legend><?= __('Venda: ').$moto[0]['modelo']['modelo'] ?></legend>
        <?php
            $this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}']);
            echo $this->Form->input('tipo', ['type' => 'hidden', 'value' => 'venda']);
            echo '<div class="row">';
                echo '<div class="medium-4 columns">';
                    echo $this->Form->input('cliente_id', ['options' => $clientes]);
                echo '</div>';
                echo '<div class="medium-6 columns">';
                    echo $this->Form->input('moto_id', ['type' => 'hidden', 'value' => $moto[0]['id']]);
                    echo $this->Form->input('data');
                echo '</div>';
                echo '<div class="medium-2 column end">';
                    echo $this->Form->input('valor',['value' => $_GET['p']]);
                echo '</div>';
            echo '</div>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'button']) ?>
    <?= $this->Form->end() ?>
</div>
