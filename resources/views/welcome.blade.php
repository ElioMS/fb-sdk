<label> Ingresar mensaje </label> <br>
<textarea name="" id="message" cols="30" rows="4"></textarea> <br>
<button id="click"> CLICK </button>
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    $('#click').on('click', function () {
        var message = $('#message').val();
        axios.post('postfb', {
            message: message
        })
            .then( response => {
                console.log(response)
            })
    });
</script>