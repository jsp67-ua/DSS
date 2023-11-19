@csrf
<label for="name">Nombre</label></br>
<input type="text" name="name" id="name" class="form-control" placeholder="--NOMBRE DEL TIPO--" value="{{ old('name', $type->name) }}"></br>
<label for="description">Descripción</label></br>
<textarea type="text" name="description" id="description" cols="30" rows="10" class="form-control" placeholder="--DESCRIPCIÓN DEL TIPO--">{{ old('description', $type->description) }}</textarea></br>

<input type="submit" value="Guardar" class="btn btn-warning"></br>

