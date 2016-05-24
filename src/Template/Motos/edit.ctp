<?= $this->element('menu'); ?>
<?= $this->element('menu_interno'); ?>
<div class="motos form small-9 columns content left">

    <?= $this->Form->create($moto) ?>
    <fieldset>
        <legend class='medium-12'><?= __('Editar Moto') ?></legend>
        
        <?php
            echo '<div class="row align-center">';
                echo '<div class="medium-4 column">';
                echo $this->Form->input('modelo_id', ['options' => $modelos]);
                echo '</div>';
                echo '<div class="medium-2 column">';
                    echo $this->Form->input('ano_fabricação', ['label' => 'Ano Fab']);
                echo '</div>';
                echo '<div class="medium-2 column">';
                echo $this->Form->input('ano_modelo', ['label' => 'Ano Mod']);
                echo '</div>';
                echo '<div class="medium-2 column end">';
                echo $this->Form->input('placa');
                echo '</div>';
            echo '</div>';
            echo '<div class="row">';
                echo '<div class="medium-4 column">';
                    echo $this->Form->input('renavam');
                echo '</div>';
                echo '<div class="medium-3 column">';
                    echo $this->Form->input('cor');
                echo '</div>';
                echo '<div class="medium-3 column end">';
                    echo $this->Form->input('valor_proposto');
                echo '</div>';
            echo '</div>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=> 'button medium-10 left']) ?>
    <?= $this->Form->end() ?>
</div>
