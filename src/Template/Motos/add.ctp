<?= $this->element('menu'); ?>
<div class="motos form large-9 medium-8 columns content">
    <?= $this->Form->create($moto) ?>
    <fieldset>
        <h3><?= __('Nova Moto (Compra)') ?></h3>
        
        <?php
            echo '<div class="medium-6 columns">';
            echo '<h4 class="medium-12 columns">Dados da moto</h4>';
                echo '<div class="medium-12 columns">';
                    echo $this->Form->input('Moto.modelo_id', ['options' => $modelos]);
                echo '</div>';
                echo '<div class="medium-6 columns">';
                    echo $this->Form->input('Moto.ano_fabricação');
                echo '</div>';
                echo '<div class="medium-6  columns">';
                    echo $this->Form->input('Moto.ano_modelo');
                echo '</div>';
                echo '<div class="medium-6 columns">';
                    echo $this->Form->input('Moto.placa');
                echo '</div>';
                echo '<div class="medium-6 columns">';
                    echo $this->Form->input('Moto.cor');
                echo '</div>';
                echo '<div class="medium-8 columns">';
                    echo $this->Form->input('Moto.renavam');
                echo '</div>';
                echo '<div class="medium-4 columns">';
                    echo $this->Form->input('Moto.valor_proposto');
                echo '</div>';
                
                
            echo '</div>';
            echo '<div class="medium-6 columns">';
            echo '<h4 class="medium-12 columns">Dados da compra</h4>';
                echo '<div class="medium-12 columns">';
                    echo $this->Form->input('Negocio.cliente_id', ['options' => $clientes]);
                echo '</div>';
                echo '<div class="medium-8 columns">';
                $this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}']);
                    echo $this->Form->input('Negocio.data', array('type' => 'date', 'label' => 'Data da compra', 'class' => 'slider-handle'));
                echo '</div>';
                echo '<div class="medium-4 columns">';
                    echo $this->Form->input('Negocio.valor');
                echo '</div>';
            echo '</div>';
        ?>
    </fieldset>
    <div class="medium-12 columns">
        <?= $this->Form->button(__('Submit'),['class' => 'button', 'content' => 'salvar']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
