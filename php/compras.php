<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Compras</title>
    
    <script>
    $(function(){
        var $paquetes = $("#paquete1,#paquete2,#paquete3");
        $paquetes.on("change",function(){
            var lugares= $(this).val();
            var precio = $(this).attr("data-precio");
            var total = lugares*precio;
            $(this).next("p").text("$"+total);
        });

        $("#modalConfirmar").modal({
            show:false
        });

        $("#btnConfirmar").on("click",function(){
            var total = 0;
            $("#modalConfirmar").modal("show");
            $paquetes.each(function(){
                var numero = $(this).val();
                var $precioCaja = $(this);
                var precio = $precioCaja.attr("data-precio")*numero;

                total = total + parseInt(precio);
                
            });
            $("#precioFinal").text("El total es: $" + total);
        });
        $("#btnAceptar").on("click", function(){
            $btn=$(this);
            $btn.prop("disabled", true);

            var lugaresPaquete1 = $("#paquete1").val();
            var lugaresPaquete2 = $("#paquete2").val();
            var lugaresPaquete3 = $("#paquete3").val();

            $.ajax({
                url:"comprar.php",
                method:"POST",
                data:{
                    paquete1: lugaresPaquete1,
                    paquete2: lugaresPaquete2,
                    paquete3: lugaresPaquete3
                }
            })
            .done(function(){
                $btn.prop("disabled", false);
                $("#modalConfirmar").modal("hide")
            })
        })
    });
    </script>
    <style>
    img{
        width:15%;
    }
    

    </style>
</head>
<body>

    <div class="row">
    <div class="col-md-4">
    <img src="../img/basico.png" alt="basico">
    <br>
    Paquete 1
    <input type="number" id="paquete1" data-precio="100" value="0" min="0" max="10">
    <p>$0</p>
    </div>

    <div class="col-md-4">    
    <img src="../img/medio.png" alt="medio">
    <br>
    Paquete 2
    <input type="number" id="paquete2" data-precio="500" value="0" min="0" max="10">
    <p>$0</p>
    </div>

    <div class="col-md-4">
    <img src="../img/premium.png" alt="premium">
    <br>
    Paquete 3
    <input type="number" id="paquete3" data-precio="1000" value="0" min="0" max="10">
    <p>$0</p>
    <br>
    </div>
    </div>

    <button class="btn btn-outline-dark" id="btnConfirmar">Comprar</button>

    <div class="modal" tabindex="-1" role="dialog" id="modalConfirmar">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Confirmar compra</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <p>¿Desea confirmar su seleccion?</p>
    <p id="precioFinal"></p>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-danger" id="btnCancelar">Cancelar</button>
    <button type="button" class="btn btn-primary" id="btnAceptar">Aceptar</button>
    </div>    
    </div>
    </div>
    </div>

</body>
</html>