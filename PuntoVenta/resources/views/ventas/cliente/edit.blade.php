@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulo: {{$articulo->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<!--almacen.categoria.update  se elimina en esta version y se deja como categoria.update -->
		</div>
	</div>

			{!!Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
			{{Form::token()}}
				<div class="row">
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre"  values="{{$articulo->nombre}}" class="form-control" required>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label>Categoria</label>
							<select name="idcategoria" class="form-control">
								@foreach ($categorias as $cat)
									@if($cat->idcategoria == $articulo->idcategoria)
										<option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
									@else
										<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
									@endif
									
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="codigo">Codigo</label>
							<input type="text" name="codigo" required values="{{$articulo->codigo}}" class="form-control" >
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="stock">Stock</label>
							<input type="text" name="stock" required values="{{$articulo->stock}}" class="form-control" >
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="descripcion">Descripcion</label>
							<input type="text" name="descripcion" values="{{$articulo->descripcion}}" class="form-control" placeholder="Descripcion del articulo...">
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="imagen">Imagen</label>
							<input type="file" name="imagen" class="form-control" >
							@if(($articulo->imagen) != "")
								<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="300px" width="300px">
							@endif
					</div>

					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
						</div>
					</div>
				</div>
			{!!Form::close()!!}
@endsection