<div class="medium-8 medium-centered">
	<a href="index" class="fi-arrow-left button hide-for-print hollow"> Voltar para listagem de negócios</a>
	<div class="button fi-print hollow hide-for-print" onclick="window.print();"> Imprimir</div>
</div>
<div class="medium-8 medium-centered hide-for-print">
	<div class='callout'>
		<div class='row'>
			<div class='medium-2 column'>Período de exibição: </div>
			<?= $this->Form->create();
			$this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}']);?>
			<div class='medium-4 column'>
				<?php
					echo $this->Form->input('Periodo.inicio', ['type' => 'date',
						'day' => ['class' => 'medium-3'],
						'month' => ['class' => 'medium-4'],
						'year' => ['class' => 'medium-4']
						]);
				?>
			</div>
			<div class='medium-4 column'>
				<?php
					echo $this->Form->input('Periodo.fim', ['type' => 'date',
						'day' => ['class' => 'medium-3'],
						'month' => ['class' => 'medium-4'],
						'year' => ['class' => 'medium-4']
						]);
				?>
			</div>
			<div class='medium-2 column'>
				<?= $this->Form->button(__('Submit'),['class' => 'button'])?>
			</div>
		</div>
	</div>
</div>

</div>
<?php  if(isset($negocios)){ ?>
<h4 class="medium-8 medium-centered">Negócios realizados <small>(Entre <?= $inicio->format('d/m/Y')?> e <?= $fim->format('d/m/Y')?>)</small></h4>
<table border="1" cellpadding="0" cellspacing="0" class="medium-8 medium-centered hover">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Cliente</th>
                <th>Moto</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Custos</th>
            </tr>
        </thead>
        <tbody>
        	<?php $saldo = 0; $custo = 0; ?>
            <?php foreach ($negocios as $negocio): ?>
            <?php
            	$saldo = ($negocio->tipo == 'venda') ? $saldo+$negocio->valor : $saldo-$negocio->valor ;
            ?>
            <tr>
                <td><?= $negocio->tipo ?></td>
                <td><?= $negocio->cliente->nome?></td>
                <td><?= $negocio->moto->modelo->modelo.' - '.$negocio->moto->ano_fabricação.'/'.$negocio->moto->ano_modelo.' '. $negocio->moto->cor .' (Placa: '.$negocio->moto->placa.')'?>
                	<?php
                	$custos = 0;
            		if (isset($negocio['custos'])) {
            			foreach ($negocio['custos'] as $v) {
            				$custos += $v->valor;
            			}
                    $custo += $custos;
            		}
           			 ?>
                </td>
                <td><?= h($negocio->data->i18nFormat('dd/MM/yyyy')) ?></td>
                <td><?= $this->Number->currency($negocio->valor) ?></td>
                <td><?= $this->Number->currency($custos)?></td>
            </tr>
            
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class='medium-8 medium-centered'>
            <h5>Saldo do período: <?= $this->Number->currency($saldo)?></h5>
            <h5>Custos do período: <?= $this->Number->currency($custo)?></h5>
            <h4>Saldo líquido: <?= $this->Number->currency($saldo-$custo)?></h4>
    </div>
<?php }else{ ?>
	<div class="medium-8 medium-centered">
		<div class="callout alert">
			Por favor, escolha um período acima.
		</div>
	</div>;
<?php } ?>
