(function ($, param) {
  $(document).ready(function () {
    $("#btnEliminar").click(function (e) {
      e.preventDefault();
      const confirm = window.confirm("Deseas actualizar el elemento?");
      if (confirm) {
        $("#form02").submit();
      }
    });
  });
})(jQuery, "¿Que rayos hace esto?");
