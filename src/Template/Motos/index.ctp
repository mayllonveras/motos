<?= $this->element('menu'); ?>
<div class="motos index large-9 medium-8 columns content">
    
    <?
        if (isset($_GET['s'])) {
            if ($_GET['s'] == 'vendidas' OR $_GET['s'] == 'todas') {
                echo '<div class="hollow button">'.$this->Html->link(__(h('Exibir padrão')), ['action' => 'index']).'</div>';
                echo "  ";
            }
            if ($_GET['s'] == 'vendidas') {
                echo '<div class="hollow button">'.$this->Html->link(__(h('Exibir Todas')), ['action' => 'index', 's' => 'todas']).'</div>';
                $titulo = 'Motos Vendidas';
            }elseif ($_GET['s'] == 'todas') {
                echo '<div class="hollow button">'.$this->Html->link(__(h('Exibir vendidas')), ['action' => 'index', 's' => 'vendidas']).'</div>';
                $titulo = 'Todas as Motos';
            }
        }else{
            echo '<div class="hollow button">'.$this->Html->link(__(h('Exibir Todas')), ['action' => 'index', 's' => 'todas']).'</div>';
            echo "  ";
            echo '<div class="hollow button">'.$this->Html->link(__(h('Exibir vendidas')), ['action' => 'index', 's' => 'vendidas']).'</div>';
            $titulo = 'Motos no Pátio';

        }
    ?>
    <h4><?= __($titulo) ?></h4>
    <?= $this->Html->link(' Gerar página para impressão', ['controller' => 'motos', 'action' => 'relatorio'], ['class' => 'secondary button fi-page'])?>
    <?= $this->element('menu_interno'); ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('modelo_id') ?></th>
                <th><?= $this->Paginator->sort('ano_fabricação') ?></th>
                <th><?= $this->Paginator->sort('ano_modelo') ?></th>
                <th><?= $this->Paginator->sort('placa') ?></th>
                <th><?= $this->Paginator->sort('cor') ?></th>
                <th><?= $this->Paginator->sort('valor_proposto') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($motos as $moto): ?>
            <tr>
                <td><?= $moto->modelo->modelo?></td>
                <td><?= $this->Number->format($moto->ano_fabricação) ?></td>
                <td><?= $this->Number->format($moto->ano_modelo) ?></td>
                <td><?= $this->Html->link(__(h($moto->placa)), ['action' => 'view', $moto->id]) ?></td>
                <td><?= h($moto->cor) ?></td>
                <td><?= $this->Number->currency(h($moto->valor_proposto)) ?></td>
                <td class="actions">
                    
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $moto->id]) ?> | 
                    <?= $this->Form->postLink(__('Delete'),['action' => 'delete', $moto->id], ['confirm' => __('Deseja realmente excluir a moto {0}?', $moto->id)]) ?>
                    <? if(isset($motosVendidas)):
                        if(!in_array($moto->id, $motosVendidas)):?>
                        <?= '<div class="success button secondary white fi-price-tag">'.$this->Html->link(__(' Vender'), ['controller' => 'negocios', 'action' => 'add', 'moto' => $moto->id, 'p'=>$moto->valor_proposto]).'</div>' ?>
                    <?  endif; 
                        endif ?>
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
