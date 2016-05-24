<?= $this->element('menu'); ?>
<div class="negocios view large-9 medium-8 columns content">
    <h3>Negócio código: <?= $negocio->id ?></h3>
    <table class="vertical-table large-6 medium-5">
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= h($negocio->tipo) ?></td>
        </tr>
        <tr>
            <th><?= __('Cliente ') ?></th>
            <td><?= $negocio->has('cliente') ? $this->Html->link($negocio->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $negocio->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Moto') ?></th>
            <td><?= $negocio->has('moto') ? $this->Html->link($negocio->moto->modelo->modelo.' - '.$negocio->moto->cor.' '.$negocio->moto->ano_fabricação.'/'.$negocio->moto->ano_modelo.' ('.$negocio->moto->placa.')', ['controller' => 'Motos', 'action' => 'view', $negocio->moto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->currency($negocio->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= h($negocio->data->i18nFormat('dd/MM/yyyy')) ?></td>
        </tr>
    </table>
    <div class="related">
        <?php $valorCustos = 0;?>
        <h4><?= __('Custos Relacionados') ?></h4>
        <div class='secondary button white'> <?= $this->Html->link(__('Novo custo'), ['controller' => 'Custos', 'action' => 'add', 'n' => $negocio->id])?>   </div>
        <?php if (!empty($negocio->custos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Valor') ?></th>
                <th><?= __('Observação') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($negocio->custos as $custos): ?>
            <tr>
                <td><?= h($custos->tipo->tipo) ?></td>
                <td><?= $this->Number->currency($custos->valor)?></td>
                <td><?= h($custos->observação) ?></td>
                <td class="actions">


                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Custos', 'action' => 'delete', $custos->id], ['confirm' => __('Deseja realmente remover este custo?')]) ?>

                </td>
            </tr>
            <?php $valorCustos = $valorCustos+$custos->valor ?>
            <?php endforeach; ?>
            <tr>
                <th><?= h('Total') ?></th>
                <th><?= $this->Number->currency($valorCustos)?></th>
                <th></th>
                <th></th>
            </tr>
        </table>
    <?php else: 
        echo '<p>Não existem custos cadastrados para este negócio.</p>'
    ?>
    <?php endif; ?>
    <?php if ($negocio->tipo == 'venda'){
            $valorFinal = $negocio->valor - $valorCustos;
        }else{
            $valorFinal = $negocio->valor + $valorCustos; }   ?>
    <h3 class='right'><?= __('Valor Final: ').$this->Number->currency($valorFinal) ?></h3>
    </div>
</div>
