        <?= $this->element('menu'); ?>

<div class="modelos view large-9 medium-8 columns content">
    <?= $this->element('menu_interno'); ?>
    <h4>Modelo</h4>
    <h3><?= h($modelo->modelo) ?></h3>
            

    <table class="vertical-table medium-3">
        <tr>
            <th><?= __('Marca') ?></th>
            <td><?= $modelo->has('marca') ? $this->Html->link($modelo->marca->nome, ['controller' => 'Marcas', 'action' => 'view', $modelo->marca->nome]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Motos Relacionadas') ?></h4>
        <?php if (!empty($modelo->motos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Ano Fabricação') ?></th>
                <th><?= __('Ano Modelo') ?></th>
                <th><?= __('Placa') ?></th>
                <th><?= __('Renavam') ?></th>
                <th><?= __('Cor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modelo->motos as $motos): ?>
            <tr>
                <td><?= h($motos->ano_fabricação) ?></td>
                <td><?= h($motos->ano_modelo) ?></td>
                <td><?= $this->Html->link(__($motos->placa), ['controller' => 'Motos', 'action' => 'view', $motos->id]) ?></td>
                <td><?= h($motos->renavam) ?></td>
                <td><?= h($motos->cor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Motos', 'action' => 'edit', $motos->id]) ?> | 

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Motos', 'action' => 'delete', $motos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $motos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
