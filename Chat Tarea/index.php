<html>
<head>
    <title>Chat en Vivo</title>
</head>

<h1>Chat Negocios Web</h1>


<input type="text" id="mensaje" value="Edgardo: ">
<button id="enviar" onclick="f()" class="btn btn-secondary">Enviar Mensaje</button>
<br>
<br>
<div id="contenedor" style="border: black 5px solid; border-radius: 5px; font-size: 15px; color: brown;"  >

</div>
<script>



    // const mensaje = document.getElementById('mensaje');
    // document.getElementById('enviar').addEventListener('click',function (e) {
    //    e.preventDefault() ;
    //    alert('llegamos')
    // });


    function f() {
        var m = document.getElementById('mensaje').value;
        ws.send(m);
        $('#contenedor').append('<p>Edgardo: '+m+'</p>');

    }

    var ws = new WebSocket('ws://192.168.43.101:4000');
    ws.onmessage=function (event) {
        var msj = event.data;
        console.log(msj);
        $('#contenedor').append('<p>'+msj+'</p>');

    }


</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>