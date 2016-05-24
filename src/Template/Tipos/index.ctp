<?= $this->element('menu'); ?>
<div class="tipos index large-9 medium-8 columns content">
    <h3><?= __('Tipos de custo') ?></h3>
    <?= $this->element('menu_interno'); ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipos as $tipo): ?>
            <tr>
                <td><?= h($tipo->tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipo->id]) ?> | 
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipo->id], ['confirm' => __('Deseja realmente excluir # {0}?', $tipo->tipo)]) ?>
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
