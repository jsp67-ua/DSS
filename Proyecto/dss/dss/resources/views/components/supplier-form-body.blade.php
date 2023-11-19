@csrf
<label for="name">Nombre</label></br>
<input type="text" name="name" id="name" class="form-control" placeholder="--SUPPLIER NAME--" value="{{ old('name', $supplier->name) }}"></br>
<label for="description">Descripción</label></br>
<textarea type="text" name="description" id="description" cols="30" rows="10" class="form-control" placeholder="--SUPPLIER DESCRIPTION--">{{ old('description', $supplier->description) }}</textarea></br>
<label for="email">Correo electrónico</label></br>
<input type="text" name="email" id="email" class="form-control" placeholder="--SUPPLIER EMAIL--" value="{{ old('email', $supplier->email) }}"></br>
<label for="phone">Teléfono</label></br>
<input type="text" name="phone" id="phone" class="form-control" placeholder="--SUPPLIER PHONE--" value="{{ old('phone', $supplier->phone) }}"></br>
<input type="submit" value="Guardar" class="btn btn-warning"></br>
