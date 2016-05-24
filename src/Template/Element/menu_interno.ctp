<div id='menu-interno' class='right'>
	<?php 
	use Cake\Utility\Inflector;

	switch ($this->name) {
		case 'Distribuicoes':
			$plural = 'Distribuições';
			$singular = 'Distribuição';
			break;
		
		default:
			$plural = $this->name;
			$singular = Inflector::singularize($this->name);
			break;
	}

	if ($this->request['action'] != 'add') {
		echo '<div class="button white fi-plus">'.$this->Html->link(' Adicionar '.$singular, 
				array('controller' => $this->name, 'action' => 'add')).'</div>';
	}
	echo " ";
	if ($this->request['action'] != 'index') {
		echo '<div class="button white fi-list">'.$this->Html->link(' Listar '.$plural, 
				array('controller' => $this->name, 'action' => 'index')).'</div>';
	}

	
	

	?>
</div>