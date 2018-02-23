<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="<?=SERVER?>/">Proyecto</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?=SERVER?>/">Home <span class="sr-only">(current)</span></a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="<?=SERVER?>/clientes/">Clientes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=SERVER?>/map/">Mapa</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?=SERVER?>/map2/">Mapa 2</a>
			</li>
			<!--
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			-->
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Buscar">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
		</form>
	</div>
</nav>