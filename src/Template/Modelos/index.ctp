        <?= $this->element('menu'); ?>

<div class="modelos index large-9 medium-8 columns content">
    <h4><?= __('Modelos') ?></h4>
    <?= $this->element('menu_interno'); ?>


    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('modelo') ?></th>
                <th><?=  'Marca' ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modelos as $modelo): ?>
            <tr>
                <td><?= $this->Html->link($modelo->modelo, ['controller' => 'Modelos', 'action' => 'view', $modelo->id]) ?></td>
                <td><?= $modelo->has('marca') ? $this->Html->link($modelo->marca->nome, ['controller' => 'Marcas', 'action' => 'view', $modelo->marca->id]) : '' ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modelo->id]) ?> | 
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modelo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->id)]) ?>
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
