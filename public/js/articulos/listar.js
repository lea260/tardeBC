(function ($, param) {
  $(document).ready(function () {
       var  $listaArticulos  =  [ ] ;
    let  url  =  $ ( "#url" ) . valor ( ) ;
    let  urlReq  =  url  +  "apiarticulos/listar" ;
    //console.log("url: "+urlReq);
    //consola.log(parámetro);
    let  headers  =  {  "Content-Type" : "application/json;charset=utf-8"  } ;
    dejar  datos  =  { } ;
    $ . ajax ( {
      url : urlReq ,
      encabezados : encabezados ,
      escriba : "POST" ,
      datos : datos ,
      tipo_de_datos : " json " ,
    } )
      . hecho ( función  ( datos )  {
        // $listaArticulos = data.datos;
        $lista  =  datos . lista;
        consola_registro ( $lista ) ;
      } )
      . fail ( función  ( jqXHR ,  textStatus ,  errorThrown )  {
        consola_registro (estado del texto) ;
      } ) ;
    $ ( ".btnAgregar" ) . cada ( función  (índice)  {
      $ ( esto ) . en ( "clic" ,  función  () {
        //consola.log("hola");
        //let articuloId = this.dataset.articuloId;
        let  articuloId  =  $ ( esto ) . datos ( "articuloId" ) ;
        let  articuloDescripcion  =  $ ( este ) . data ( "articuloDescripcion" ) ;
        let  articuloCodigo  =  $ ( este ) . datos ( "articuloCodigo" );
        consolalog ( articuloId ) ;
        
      }); //end item click
    }); //end item click items foreach
  }); //end ready
})(jQuery);
