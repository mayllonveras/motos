<?= $this->element('menu'); ?>
<div class="clientes view large-9 medium-8 columns content">
    <?= $this->element('menu_interno'); ?>
    <h4>Cliente</h4>
    <h3><?= h($cliente->nome) ?></h3>
    
    <table class="vertical-table medium-5 columns">
       
        <tr>
            <th><?= __('Fone') ?></th>
            <td><?= h($cliente->fone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cliente->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4 class='medium-12 columns'><?= __('Negócios Relacionados') ?></h4>
        <?php if (!empty($cliente->negocios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Moto') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Valor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->negocios as $negocios): ?>
            <tr>
                <td><?= h($negocios->moto->modelo->modelo.' - '.$negocios->moto->cor.' '.$negocios->moto->ano_fabricação.'/'.$negocios->moto->ano_modelo.' ('.$negocios->moto->placa.')') ?></td>
                <td><?= h($negocios->data->i18nFormat('dd/MM/yyyy')) ?></td>
                <td><?= h($negocios->tipo) ?></td>
                <td><?= h($this->Number->currency($negocios->valor)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Negocios', 'action' => 'view', $negocios->id]) ?> | 

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Negocios', 'action' => 'edit', $negocios->id]) ?> | 

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Negocios', 'action' => 'delete', $negocios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $negocios->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
