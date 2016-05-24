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
<?php 
    if(isset($negocios)){
        $lucroBrutoTotal = 0; 
        $custosTotal = 0; ?>
        <div class="medium-8 medium-centered text-center">
            <h4>Lucro por período (<?= $inicio->format('d/m/Y').' - '.$fim->format('d/m/Y') ?>)</h4>
        </div>
        <?php foreach ($negocios as $negocio) { ?>
        <table border="2" margin="0" cellpadding="0" cellspacing="0" class="medium-8 medium-centered hover vertical-table">
            <tr>
                <th class='medium-4 text-left'>
                    <?= $negocio[0]->moto->modelo->modelo.' - '.$negocio[0]->moto->cor.' - '.$negocio[0]->moto->ano_fabricação.'/'.$negocio[0]->moto->ano_modelo.' - Placa: '.$negocio[0]->moto->placa ?>
                </th>
                <th>COMPRA</th>
                <th>VENDA</th>
            </tr>
            <tr>
                <th class='text-left'>Data</th> 
                <td><?= $negocio[0]->data->i18nFormat('dd/MM/yyyy') ?></td>
                <td><?= $negocio[1]->data->i18nFormat('dd/MM/yyyy') ?></td>
            </tr>
            <tr>
                <th class='text-left'>Cliente</th> 
                <td><?= $negocio[0]->cliente->nome ?></td>
                <td><?= $negocio[1]->cliente->nome ?></td>
            </tr> 
            <tr>
                <th class='text-left'>Valor</th> 
                <td><?= $this->Number->currency($negocio[0]->valor) ?></td>
                <td><?= $this->Number->currency($negocio[1]->valor) ?></td>
                <?php $lucroBruto = $negocio[1]->valor-$negocio[0]->valor ?>
            </tr>   
            <tr>
                <th class='text-left'>Custos</th> 
                <td><?php
                    $valorCustoCompra = 0;
                    foreach ($negocio[0]->custos as $custo) {
                        $valorCustoCompra += $custo->valor;
                    }
                    echo $this->Number->currency($valorCustoCompra);
                 ?></td>
                <td><?php
                    $valorCustoVenda = 0;
                    foreach ($negocio[1]->custos as $custo) {
                        $valorCustoVenda += $custo->valor;
                    }
                    echo $this->Number->currency($valorCustoVenda);
                    $LucroLiquido = $lucroBruto-$valorCustoVenda-$valorCustoCompra;
                 ?></td>
            </tr>
            <tr>
                <th class='text-left'>Lucro</th> 
                <th class='text-left'>Bruto: <?=  $this->Number->currency($lucroBruto) ?></th>
                <th class='text-left'>Liquido: <?= $this->Number->currency($LucroLiquido) ?></th>
            </tr>

        </table>
        <?php   $lucroBrutoTotal += $lucroBruto; 
                $custosTotal += ($valorCustoCompra+$valorCustoVenda); 
            ?>
<?php  
    }//end foreach
    echo '<div class="medium-8 medium-centered">
            <div class="callout">
                <h4 class="text-center callout">Síntese do período</h4>
                <div class="callout">';
                    echo "<h5><strong>Lucro bruto:</strong> ".$this->Number->currency($lucroBrutoTotal)."</h5>";
                    echo "<h5><strong>Custos:</strong> ".$this->Number->currency($custosTotal)."</h5>";
                    echo "<h5><strong>Lucro liquido:</strong> ".$this->Number->currency($lucroBrutoTotal-$custosTotal)."</h5>";
    echo '      </div>
            </div>  
        </div>';
        }else{?>
            <div class="medium-8 medium-centered">
                <div class="callout alert">
                    Por favor, escolha um período acima.
                </div>
            </div>;
        <?php } // end else?>
