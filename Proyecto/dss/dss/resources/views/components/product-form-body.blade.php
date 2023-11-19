@csrf
<label for="name">Nombre</label></br>
<input type="text" name="name" id="name" class="form-control" placeholder="--NOMBRE DEL PRODUCTO--" value="{{ old('name', $product->name) }}"></br>

<label for="description">Descripción</label></br>
<textarea type="text" name="description" id="description" cols="30" rows="10" class="form-control" placeholder="--DESCRIPCIÓN DEL PRODUCTO--">{{ old('description', $product->description) }}</textarea></br>

<label for="">Imagen</label></br>
<input type="file" name="image" id="" class="form-control" accept="image/"></br>

<label for="price">Precio</label></br>
<input type="text" name="price" id="price" class="form-control" placeholder="--PRECIO DEL PRODUCTO--" value="{{ old('price', $product->price) }}"></br>

<label for="stock">Existencias</label></br>
<input type="text" name="stock" id="stock" class="form-control" placeholder="--EXISTENCIAS DEL PRODUCTO--" value="{{ old('stock', $product->stock) }}"></br>

<label for="type_id">Tipo (SOLO PUEDES SELECCIONAR UNO)</label></br>
<select name="type_id" id="type_id" class="form-control selectpicker"
title="Selecciona el tipo" data-live-search="true">

    @foreach( $type as $key => $value )
        <option value=" {{ $value->id }} "
        @if($product->id != null)
            @if($product->getTypes()->id == $value->id)
                selected
            @endif
        @endif
        >
            {{ $value->name }} 
        </option>
    @endforeach

</select></br></br>

<label for="supplier">Proveedores (PUEDES SELECCIONAR MÁS DE UN PROVEEDOR)</label></br>
<select name="supplier[]" id="supplier" class="form-control selectpicker"
title="Selecciona los proveedores" multiple data-live-search="true">

    @foreach( $suppliers as $key => $value )
    @php $check = in_array($value->id, 
    $product->suppliers->pluck('id')->toArray()) ? 'selected' : ''@endphp
        <option value=" {{ $value->id }} "{{ $check }}>
            {{ $value->name }} 
        </option>
    @endforeach

</select></br></br>

<input type="submit" value="Guardar" class="btn btn-warning"></br>

