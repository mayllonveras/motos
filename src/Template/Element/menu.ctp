<?php
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

echo '<nav class="large-3 medium-4 columns" id="actions-sidebar">';
	echo '<ul class="side-nav">';
		foreach (ConnectionManager::get('default')->
							schemaCollection()->listTables() as $model) 
		{
			switch ($model) {
				case 'negocios':
					$ptbr = 'negócios';
					echo '<li>';
					echo $this->Html->link(ucfirst($ptbr), array('controller' => $model));
					echo '</li>';
					break;
				case 'tipos':
					$ptbr = 'Tipos de Custo';
					echo '<li>';
					echo $this->Html->link(ucfirst($ptbr), array('controller' => $model));
					echo '</li>';
					break;
				case 'custos':
					break;
				default:
					$ptbr = $model;
					echo '<li>';
					echo $this->Html->link(ucfirst($ptbr), array('controller' => $model));
					echo '</li>';
					break;
			}	
		}
	echo '<ul>';
echo '</nav>';
?>