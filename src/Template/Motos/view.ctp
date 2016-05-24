<?= $this->element('menu'); ?>
<div class="motos view large-9 medium-8 columns content">
    <?= $this->element('menu_interno'); ?>
    <h3><?= h($moto->modelo->modelo.' - '.$moto->cor.' - '.
    $moto->ano_fabricação.'/'.$moto->ano_modelo.' ('.$moto->placa.')') ?></h3>
    <table class="vertical-table large-4 medium-3">
        <tr>
            <th><?= __('Renavam') ?></th>
            <td><?= h($moto->renavam) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Proposto') ?></th>
            <td><?= $this->Number->currency(h($moto->valor_proposto)) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Negócios relacionados') ?></h4>
        <?php if (!empty($moto->negocios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Código') ?></th>
                <th><?= __('Cliente Id') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Valor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($moto->negocios as $negocios): ?>
            <tr>
                <td><?= $this->Html->link(__($negocios->id), ['controller' => 'Negocios', 'action' => 'view', $negocios->id]) ?></td>
                <td><?= $this->Html->link(__($negocios->cliente->nome), ['controller' => 'Clientes', 'action' => 'view', $negocios->cliente->id]) ?></td>
                <td><?= h($negocios->data->i18nFormat('dd/MM/yyyy')) ?></td>
                <td><?= h($negocios->tipo) ?></td>
                <td><?= h($this->Number->currency($negocios->valor)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Negocios', 'action' => 'edit', $negocios->id]) ?> | 

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Negocios', 'action' => 'delete', $negocios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $negocios->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
