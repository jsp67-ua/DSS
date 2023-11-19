@csrf
<label for="name">Nombre</label></br>
<input type="text" name="name" id="name" class="form-control" placeholder="--NOMBRE DE USUARIO--" value="{{ old('name', $user->name) }}"></br>
<label for="address">Dirección</label></br>
<textarea type="text" name="address" id="address" cols="10" rows="3" class="form-control" placeholder="--DIRECCIÓN--"> {{ old('address', $user->address) }} </textarea></br>
<label for="email">Correo Electrónico</label></br>
<input type="text" name="email" id="email" class="form-control" placeholder="--CORREO ELECTRÓNICO--" value="{{ old('email', $user->email) }}"></br>
<label for="admin">Administrador</label></br>
<select name="admin" id="admin" class="form-control selectpicker" 
title=" ¿Es administrador? ">
    <option value="0"> NO </option>
    <option value="1"> SI </option>
</select></br></br>
<label for="password">Contraseña</label></br>
<input type="password" name="password" id="password" class="form-control" placeholder="--CONTRASEÑA--" value="{{ old('password', $user->password) }}"></br>
</br>
<input type="submit" value="Guardar" class="btn btn-warning"></br>
