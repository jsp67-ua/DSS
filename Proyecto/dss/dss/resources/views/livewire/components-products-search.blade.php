<div>

    <div class="navbar navbar-expand-lg bg-dark">
        <label class="font-weight-bold h2 text-center mx-auto text-white">Productos de la categoría {{ $type->name }}</label>
        <div class="dropdown" style="padding-right: 50px;">
            <select name="sortBy" class="float-right btn btn-secondary dropdown-toggle" wire:model="sortBy">
                <option value="default" selected="selected">Nombre Ascendente</option>
                <option value="namedesc">Nombre Descendente</option>
                <option value="priceasc">Precio Ascendente</option>
                <option value="pricedesc">Precio Descendente</option>
            </select>
        </div>
    </div>
    <section class="section-name">
                <div class="row text-center" style="padding-left: 300px; padding-right: 300px; padding-bottom: 50px;">
                    @foreach($products as $item)
                        <div class="col-6 col-md-3" style="padding-top: 20px;">
                            <a href=" {{ route('product.UserShow', $item->id) }}" class="text-dark" style="text-decoration: none;">
                                <div class="card border border-dark" style="width: 18rem; height: 420px;">
                                    <img class="rounded" src=" {{ $item->image }}" alt="Imagen" width="286px" height="286px">
                                    <div class="card-body table-responsive" style="background-color: white;">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text text-danger">{{ $item->price }}€</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div style="padding-top: 20px;">
                        {{ $products->links() }}
                    </div>
                </div> <!-- row.// -->
        </section>
</div>
