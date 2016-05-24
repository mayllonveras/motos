<?= $this->element('menu'); ?>
<div class="custos view large-9 medium-8 columns content">
    <h3><?= h($custo->nome) ?></h3>
    <?= $this->element('menu_interno'); ?>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $custo->has('tipo') ? $this->Html->link($custo->tipo->id, ['controller' => 'Tipos', 'action' => 'view', $custo->tipo->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Negocio') ?></th>
            <td><?= $custo->has('negocio') ? $this->Html->link($custo->negocio->id, ['controller' => 'Negocios', 'action' => 'view', $custo->negocio->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($custo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($custo->valor) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observação') ?></h4>
        <?= $this->Text->autoParagraph(h($custo->observação)); ?>
    </div>
</div>
