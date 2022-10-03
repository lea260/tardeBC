(function ($) {
  $(document).ready(function () {
    function convertUTCDateToLocalDate(date) {
      
      let offset = date.getTimezoneOffset() / 60;
      let hours = date.getHours();
      date.setHours(hours - offset);
      return date;
    }
    function agregarCero(input) {
      let salida = input;
      if (input < 10) {
        input = "0" + input;
      }
      return input;
    }
    function formatoFecha(fecha, formato) {
      const map = {
        dd: agregarCero(fecha.getDate()),
        mm: agregarCero(fecha.getMonth()),
        yy: agregarCero(fecha.getFullYear().toString().slice(-2)),
        yyyy: agregarCero(fecha.getFullYear()),
        h: agregarCero(fecha.getHours()),
        m: agregarCero(fecha.getMinutes()),
        s: agregarCero(fecha.getSeconds()),
      };

      return formato.replace(/dd|mm|yyyy|h|m|s/gi, (matched) => map[matched]);
    }

    $(".fecha").each(function (index) {
      let fecha = $(this).text();
      let horaLocal = convertUTCDateToLocalDate(new Date(fecha));
      $(this).text(formatoFecha(horaLocal, "dd-mm-yyyy h:m:s"));
    });
  }); //end ready
})(jQuery);
