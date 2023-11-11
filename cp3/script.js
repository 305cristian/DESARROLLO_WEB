let carrito = [];

function add_to_cart(id) {

    const producto = productos.find((producto) => producto.id === id);
    const existe = carrito.find((item) => item.id === id);

    if (existe) {
        alert('Este producto ya se encuentra cargado al carrito de compras.');
    } else {
        carrito.push(producto);
        mostrarCarrito();
    }
}

function mostrarCarrito() {
    var carritoItems = '';
    var cart = document.getElementById('carritoItems');
    carritoItems = '<table class="table table-bordered" style="width:100%">';
    carritoItems+= '<thead>';
    carritoItems+='<tr>';
    carritoItems+='<th>Imagen</th>';
    carritoItems+='<th>Nombre</th>';
    carritoItems+='<th>Descripcion</th>';
    carritoItems+='<th>Precio</th>';
    carritoItems+='<th>Acción</th>';
    carritoItems+='</tr>';
    carritoItems+='</thead>';
    
   
    carrito.forEach((producto) => {
        carritoItems.innerHTML += ' <tr>';
           
        carritoItems += '<td><img src="'+producto.imagen+'" alt="${producto.descripcion}" style="width: 100px; height: 100px;" /> </td>';
      
        carritoItems += '<td> '+producto.nombre+'  </td>';
  
        carritoItems += '<td>  '+producto.descripcion+' </td>';
    
        carritoItems += '<td> '+producto.precio+' </td>';

        carritoItems += '<td> <button class="btn btn-danger" onclick="removerDelCarrito('+producto.id+')"><i class="fas fa-trash"></i></button> </td>',
  
        carritoItems += '</tr>';
         
    });
    carritoItems += '</table>';
    carritoItems +=' <div class="col-md-12 text-right"> <button class="btn btn-primary"><i class="fas fa-save"></i> Comprar</button> <div>';
 
    cart.innerHTML=carritoItems;
}

function removerDelCarrito(id) {
    carrito = carrito.filter((producto) => producto.id !== id);
    mostrarCarrito();
}