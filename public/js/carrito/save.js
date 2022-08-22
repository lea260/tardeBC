(function ($) {
  $(document).ready(function () {
    let url = document.getElementById("url").value;
    console.log(url);
     let headers = { "Content-Type": "application/json;charset=utf-8" };
    $("body").on("click", "#save", function () {
        let carrito = JSON.parse(localStorage.getItem("carrito"));

         $.ajax({
           url: `${url}carrito/save`,
           headers: headers,
           type: "POST",
           data: JSON.stringify(carrito),
           dataType: "json",
         });

        // $.ajax({
        //   type: "POST",
        //   dataType: "json",
        //   url: `${url}carrito/save`,
        //   data: JSON.stringify(carrito),
        //   contentType: "application/json; charset=utf-8",
        //   success: function (data) {
        //     alert("Items added");
        //   },
        //   error: function (e) {
        //     console.log(e.message);
        //   },
        // });
    }); //end body
  });
})(jQuery);
