<!DOCTYPE html>
<html>
<head>
    <title>Conversión de Texto y Binario</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Conversión de Texto y Binario</h1>
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Texto a Binario</h3>
                <form id="textToBinaryForm" method="POST" action="{{ route('convert.text.to.binary') }}">
                    @csrf
                    <div class="form-group">
                        <label for="text">Texto:</label>
                        <input type="text" class="form-control" id="text" name="text" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Convertir a Binario</button>
                </form>
                <div id="binaryResult" class="mt-3"></div>
            </div>
            <div class="col-md-6">
                <h3>Binario a Texto</h3>
                <form id="binaryToTextForm" method="POST" action="{{ route('convert.binary.to.text') }}">
                    @csrf
                    <div class="form-group">
                        <label for="binary">Binario:</label>
                        <input type="text" class="form-control" id="binary" name="binary" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Convertir a Texto</button>
                </form>
                <div id="textResult" class="mt-3"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#textToBinaryForm').on('submit', function(event) {
                event.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let data = form.serialize();

                $.post(url, data, function(response) {
                    $('#binaryResult').html('<strong>Binario:</strong> ' + response.binary);
                });
            });

            $('#binaryToTextForm').on('submit', function(event) {
                event.preventDefault();
                let form = $(this);
                let url = form.attr('action');
                let data = form.serialize();

                $.post(url, data, function(response) {
                    $('#textResult').html('<strong>Texto:</strong> ' + response.text);
                });
            });
        });
    </script>
</body>
</html>
