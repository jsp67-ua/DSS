<div style="display: flex; justify-content: space-between;">
    <div><h2>Datos de compra</h2><br/>
        <a>Total compra: {{ $cart->total }} €</a><br/><br/><br/>
        <li><a href="{{ route('cartuser.index') }}">Volver</a></li>
    </div>
    <div><h2>Datos de usuario</h2><br/>
        <a>Nombre: {{ $user->name }}</a><br />
        <a>Dirección de envío: {{ $user->address }}</a>
    </div>
    <div><h2>Selecciona un método de pago</h2><br/>
        <select wire:model="paymentMethod">
            <option value="card">Tarjeta de crédito</option>
            <option value="paypal">PayPal</option>
            <option value="transfer">Transferencia</option>
            <option value="bitcoin">Bitcoin</option>
        </select>
        <button wire:click="purchase">Comprar</button><br/><br/>
    </div>
</div>
    
    
    
    
    
