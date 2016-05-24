<div class="medium-8 medium-centered">
    <a href="index" class="fi-arrow-left button hide-for-print hollow"> Voltar para listagem de motos</a>
    <div class="button fi-print hollow hide-for-print" onclick="window.print();"> Imprimir</div>
</div>
<h4 class="medium-8 medium-centered">Motos à venda <small class='right'>(Gerado em <?= date('d/m/Y')?>)</small></h4>
<table border="1" cellspacing="0" class="medium-8 medium-centered">
        <thead>
            <tr>
                <th>Moto</th>
                <th>Valor Proposto</th>
                <th class='show-for-print'>Vendida</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($motos as $moto): ?>
            <tr>
                <td><?= $moto->modelo->modelo.' '.$moto->cor.' '.$moto->ano_fabricação.'/'.$moto->ano_modelo.' (placa: '.$moto->placa.')'?></td>
                <td><?= $this->Number->currency(h($moto->valor_proposto)) ?></td>
                <td class='show-for-print'></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>