
<head>
    <script src="https://sis-t.redsys.es:25443/sis/NC/sandbox/redsysV2.js"></script>
</head>

<body>
    <div id="card-form" class="mt-4"> </div>
    <form name="datos">
        <input type="hidden" id="token"></input>
        <input type="hidden" id="errorCode"></input>
        <a href="javascript:alert(document.datos.token.value + '--' + document.datos.errorCode.value)"> ver</a>
    </form>

    <script>
        function merchantValidationEjemplo() {
            //Insertar validaciones…
            alert("Esto son validaciones propias");
            return true;
        }
 
            window.addEventListener("message", function receiveMessage(event) {
                storeIdOper(event, "token", "errorCode", merchantValidationEjemplo);
            });



        function pedido() {
            return "pedido" + Math.floor((Math.random() * 1000) + 1);
        }
        getInSiteForm('card-form', '', '', '', '', 'Pagar', '999008881', '1', pedido(), 'ES', true);

    </script>
</body>
