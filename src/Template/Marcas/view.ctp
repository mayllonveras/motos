<?= $this->element('menu'); ?>

<div class="marcas view large-9 medium-8 columns content">
    <h4>Marca</h4>
    <h3><?= h($marca->nome) ?></h3>
    <div class="related">
        <h4><?= __('Modelos relacionados') ?></h4>
        <?php if (!empty($marca->modelos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Modelo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($marca->modelos as $modelos): ?>
            <tr>
                <td><?= $this->Html->link(__($modelos->modelo), ['controller' => 'Modelos', 'action' => 'view', $modelos->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Modelos', 'action' => 'edit', $modelos->id]) ?> | 
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Modelos', 'action' => 'delete', $modelos->id], ['confirm' => __('Deseja realmente exculir o midelo # {0}?', $modelos->modelo)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
