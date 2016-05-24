<?= $this->element('menu'); ?>
<div class="marcas index large-9 medium-8 columns content">
    
    <h4><?= __('Marcas') ?></h4>
    <?= $this->element('menu_interno'); ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marcas as $marca): ?>
            <tr>
                <td><?= $this->Html->link(__($marca->nome), ['action' => 'view', $marca->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $marca->id]) ?> | 
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $marca->id], ['confirm' => __('Deseja reanlemte excluir a marca # {0}?', $marca->nome)]) ?>
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
