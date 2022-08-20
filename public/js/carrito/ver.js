(function ($) {
  $(document).ready(function () {
    
    let carrito = JSON.parse(localStorage.getItem("carrito"));
    carrito.forEach((element) => {
      //let insert = `<button type="button" class="btn btn-primary">${element.id}</button>`
      let insert02 = `<div class="col-lg-4 col-md-6 col-sm-6 col-xs-4 p-3"
        id="art-${element.id}">
        <div class="card">
          <img class="card-img-top" src="${element.url}" alt="Card image cap"/>
          <div class="card-body">
            <h5 class="card-title">ID:${element.id} ${element.codigo}</h5>
            <p class="card-text">${element.descripcion}</p>
            <p class="card-text">$ ${element.precio}</p>
            <input id="cant-${element.id}" class="form-control"
            value="${element.cantidad}" type="number" disabled
            ></p>
            <button type="button" class="btn btn-danger btnEliminar"
            data-articulo-id="${element.id}"
                        >Eliminar</button>
          </div>
          </div><!-- end card -->
        </div><!-- end col --><?php }`;
      $("#carritoId").after(insert02);
    });

    $("body").on("click", ".btnEliminar", function () {
      //console.log("entro");
      let articuloId = $(this).data("articuloId");
      //console.log(articuloId);
      const confirm = window.confirm("Deseas eliminar el elemento?");
      if (confirm) {
        $("#art-" + articuloId).remove();
        //actualizar
        //localStorage.setItem("carrito", JSON.stringify(carrito));
        let carritoStr = localStorage.getItem("carrito");
        if (carritoStr) {
          //console.log(carritoStr);
          let carrito = JSON.parse(carritoStr);
          //console.log(carrito);
          let itemCarrito = carrito.find(
            (articulo) => articulo.id == articuloId
          );
          carrito.forEach(function (art, index, object) {
            if (art.id == articuloId) {
              object.splice(index, 1);
              localStorage.setItem("carrito", JSON.stringify(carrito));
              //console.log("probando");
            }
            $("#cantidadElemCarrito").text(carrito.length);
          });
          //$("#cantidadElemCarrito").text(carrito.length);
        }
      }
    }); //end body

    
  });
})(jQuery);
