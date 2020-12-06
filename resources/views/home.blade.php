<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Route Planning</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <strong>Route Planning</strong>
            </a>
        </div>
    </div>
</header>

<main role="main">
    <section class="jumbotron">
        <div class="container">
            <form action="/route-calculate" method="POST">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <p>{{ $errors->first() }}</p>
                    </div>
                @endif
                <div class="row">
                    <p>
                        <a id="demoAddressButton" class="btn btn-primary" href="javascript:;">Set Demo Addresses</a>
                    </p>
                </div>
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label><b>Origin Address:</b></label>
                        <textarea class="form-control" name="address[]" id="" cols="30" rows="2"></textarea>
                    </div>

                    @for($i = 1; $i <= 10; $i++)
                        <div class="col-md-12 mb-3">
                            <label>Address {{ $i }}:</label>
                            <textarea class="form-control" name="address[]" id="" cols="30" rows="2"></textarea>
                        </div>
                    @endfor
                </div>

                <input type="submit">
                @csrf
            </form>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#demoAddressButton').click(function () {
            $('textarea[name = "address[]"]').eq(0).val("Florya Sahil");
            $('textarea[name = "address[]"]').eq(1).val("Tüyap Metrobüs");
            $('textarea[name = "address[]"]').eq(2).val("Çamlıca Tepesi");
            $('textarea[name = "address[]"]').eq(3).val("Kadıköy boğa heykeli");
            $('textarea[name = "address[]"]').eq(4).val("Beşiktaş meydan");
            $('textarea[name = "address[]"]').eq(5).val("Çağlayan Adliyesi");
            $('textarea[name = "address[]"]').eq(6).val("Perpa Metrobüs");
            $('textarea[name = "address[]"]').eq(7).val("Zorlu Center Avm");
            $('textarea[name = "address[]"]').eq(8).val("Trump Towers Avm");
            $('textarea[name = "address[]"]').eq(9).val("Maslak Oto Sanayi");
            $('textarea[name = "address[]"]').eq(10).val("Sarıyer Sahil");
        });
    });
</script>
</body>
</html>
