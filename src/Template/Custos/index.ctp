<?= $this->element('menu'); ?>
<div class="custos index large-9 medium-8 columns content">
    <?= $this->element('menu_interno'); ?>
    <h3><?= __('Custos') ?></h3>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('tipo_id') ?></th>
                <th><?= $this->Paginator->sort('negocio_id') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($custos as $custo): ?>
            <tr>
                <td><?= $this->Number->format($custo->id) ?></td>
                <td><?= $custo->has('tipo') ? $this->Html->link($custo->tipo->id, ['controller' => 'Tipos', 'action' => 'view', $custo->tipo->id]) : '' ?></td>
                <td><?= $custo->has('negocio') ? $this->Html->link($custo->negocio->id, ['controller' => 'Negocios', 'action' => 'view', $custo->negocio->id]) : '' ?></td>
                <td><?= $this->Number->format($custo->valor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $custo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $custo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $custo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custo->id)]) ?>
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
