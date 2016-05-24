<html>
<head>
	<title>Edmotos Multimarcas - Relatório - <?= $this->name; ?> - <?= date('d_m_Y')?> </title>
	<?= $this->Html->meta('icon') ?>
	<?= $this->Html->css(['foundation/css/foundation.min.css']) ?>
	<?= $this->Html->css('foundation-icons/foundation-icons.css') ?>
	<?= $this->Html->css('motos.css') ?>
</head>
<body>
  <div class="medium-9 small-centered columns text-center">
  	<h3>Edmotos Multimarcas</h3>
  	<h4>Relatório</h4>
  	</div>
  	<?= $this->fetch('content') ?>
</body>
</html>