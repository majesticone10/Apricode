<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>Laravel</title>
</head>

<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-8 text-center mx-auto border rounded p-5 bg-secondary bg-opacity-25 shadow mt-5">
                <h1>
                    Тестовое задание от <strong>Apricode</strong> 
                </h1>
                <p>
                    на вакансию junior php developer
                </p>
                <h3>
                    Малухин Кирилл Владимирович
                </h3>
                <p>
                    Резюме c HeadHunter <a href="https://ekaterinburg.hh.ru/resume/28d3028fff08df5bf10039ed1f52324c784a38">здесь</a> 
                </p>
                <a href="{{route('games.index')}}" class="fs-3"><b>Войти</b></a>
            </div>
        </div>
    </div>
</body>

</html>
