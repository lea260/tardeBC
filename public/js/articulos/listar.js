(function ($) {
  $(document).ready(function () {
    var $lista = [];
    let url = $("#url").val();
    let urlReq = url + "apiarticulos/listar";
    //console.log("url: "+urlReq);
    //console.log(param);
    let headers = { "Content-Type": "application/json;charset=utf-8" };
    let data = {};
    $.ajax({
      url: urlReq,
      headers: headers,
      type: "POST",
      data: data,
      dataType: "json",
    })
      .done(function (data) {
        //$listaArticulos = data.datos;
        $lista = data.lista;
        console.log($lista);
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
      });

    $(".btnAgregar").each(function (index) {
      $(this).on("click", function () {
        //console.log("hola");
        //let articuloId = this.dataset.articuloId;
        let articuloId = $(this).data("articuloId");
        let articuloDescripcion = $(this).data("articuloDescripcion");
        let articuloCodigo = $(this).data("articuloCodigo");
        console.log(articuloId);
        let articulo = $lista.find((art) => art.id == articuloId);
        console.log(articulo);
        //
        let item = {
          id: $id,
          precio: articulo.precio,
          descripcion: articulo.descripcion,
          url: articulo.url,
          cantidad: cantidad,
        };
        let carritoStr = localStorage.getItem("carrito");
        let carritoArr = [];
        if (carritoStr) {
          JSON.parse(carritoStr);
        }
        console.log(item);
      });
    });
  }); //end ready
})(jQuery);
//
