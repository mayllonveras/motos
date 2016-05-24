<?= $this->element('menu'); ?>
<div class="negocios index large-9 medium-8 columns content">
    <h3><?= __('Negócios') ?></h3>
    <?= $this->Html->link(' Gerar relatório de negócios', ['controller' => 'negocios', 'action' => 'relatorio'], ['class' => 'secondary button fi-page'])?>
    <?= $this->Html->link(' Gerar relatório de lucros', ['controller' => 'negocios', 'action' => 'relatoriolucros'], ['class' => 'secondary button fi-page'])?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('cliente_id') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th><?= $this->Paginator->sort('moto_id') ?></th>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($negocios as $negocio): ?>
            <tr>
                <td><?= $negocio->has('cliente') ? $this->Html->link($negocio->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $negocio->cliente->id]) : '' ?></td>
                <td><?= $negocio->tipo ?></td>
                <td><?= $negocio->has('moto') ? $this->Html->link($negocio->moto->modelo->modelo.' - '. $negocio->moto->cor .' ('.$negocio->moto->placa.')', ['controller' => 'Motos', 'action' => 'view', $negocio->moto->id]) : '' ?></td>
                <td><?= h($negocio->data->i18nFormat('dd/MM/yyyy')) ?></td>
                <td><?= $this->Number->currency($negocio->valor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $negocio->id]) ?> | 
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $negocio->id]) ?> | 
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $negocio->id], ['confirm' => __('Deseja realmente excluir o Negócio de código {0}?', $negocio->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
