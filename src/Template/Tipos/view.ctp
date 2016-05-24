<?= $this->element('menu'); ?>
<div class="tipos view large-9 medium-8 columns content">
    <?= $this->element('menu_interno'); ?>
    <h3><?= h($tipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= h($tipo->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipo->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Custos') ?></h4>
        <?php if (!empty($tipo->custos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Tipo Id') ?></th>
                <th><?= __('Negocio Id') ?></th>
                <th><?= __('Valor') ?></th>
                <th><?= __('Observação') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipo->custos as $custos): ?>
            <tr>
                <td><?= h($custos->id) ?></td>
                <td><?= h($custos->tipo_id) ?></td>
                <td><?= h($custos->negocio_id) ?></td>
                <td><?= h($custos->valor) ?></td>
                <td><?= h($custos->observação) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Custos', 'action' => 'view', $custos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Custos', 'action' => 'edit', $custos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Custos', 'action' => 'delete', $custos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $custos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
