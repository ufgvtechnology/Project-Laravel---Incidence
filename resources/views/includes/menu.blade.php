<div class="panel panel-primary">
	<div class="panel-heading">Menú</div>
	<div class="panel-body">
		<div class="list-group">
			<ul class="nav nav-pillis nav-stacked">
				@if(auth()->check())
				<li>
					  <a href="#" >Dashboard</a>
			    </li>
			    <li>
				  <a href="#" class="">Ver incidencias</a>
				</li>
				<li><a href="">Reportar incidencia</a></li>

				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						Administración<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="">Usuarios</a></li>
						<li><a href="">Proyectos</a></li>
						<li><a href="">Configuración</a></li>
					</ul>
					
				</li>
				@else
				<li><a href="">Bienvenido</a></li>
				<li><a href="">Instrucciones</a></li>
				<li><a href="">Créditos</a></li>
				@endif

			</ul>
		</div>
	</div>
</div>



