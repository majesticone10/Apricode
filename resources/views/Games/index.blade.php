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
                <div class="row">

            <div class="d-grid gap-2 d-block mt-1 p-0">
                @if (session('status'))

                <div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                  </div>
                @endif
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">Добавить игру</button>

                <!-- Модальное окно add -->
                <form action="{{route('games.create')}}" method="GET" enctype="application/x-www-form-urlencoded">
                    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addGame" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addGame">
                                        Добавить игру
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Назание игры</span>
                                        <input type="text" class="form-control" aria-label="name" name="name"  aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mt-3">
                                        <span class="input-group-text" id="addon-wrapping">Студия разработчик</span>
                                        <input type="text" class="form-control" aria-label="studio" name="studio" aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mt-3">
                                        <span class="input-group-text" id="addon-wrapping">Выберете или добавьте жанр</span>
                                        <input class="form-control" list="genre" placeholder="Введите для поиска..." name="genre">
                                        <datalist id="genre">
                                            @foreach ($genres as $genre)
                                            <option value="{{$genre->name}}">
                                            @endforeach
                                        </datalist>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Добавить</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Отменить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-12 border mt-1">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col"><a href="" title="Сортировать по названию">Название игры</a></th>
                            <th scope="col"><a href="" title="Сортировать по студии">Студия разработчик</a></th>
                            <th scope="col"><a href="" title="Сортировать по жанру">Жанры</a></th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($games as $game)
                            <tr>
                                <th scope="row">{{$game->id}}</th>
                                <td>{{ $game->name }}</td>
                                <td>{{ $game->studio }}</td>
                                <td>{{ $game->genre }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button title="Edit" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#edit{{$game->id}}">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Модальное окно edit -->
                                        <form action="{{route('games.edit', $game['id'])}}" method="get" enctype="application/x-www-form-urlencoded">
                                            @csrf
                                            <div class="modal fade" id="edit{{$game->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Изменить запись №{{$game->id}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text" id="addon-wrapping">Назание игры</span>
                                                                <input type="text" class="form-control" aria-label="name" name="name" value="{{$game->name}}" aria-describedby="addon-wrapping">
                                                            </div>

                                                            <div class="input-group flex-nowrap mt-3">
                                                                <span class="input-group-text" id="addon-wrapping">Студия разработчик</span>
                                                                <input type="text" class="form-control" aria-label="studio" name="studio" value="{{$game->studio}}" aria-describedby="addon-wrapping">
                                                            </div>

                                                            <div class="input-group flex-nowrap mt-3">
                                                                <span class="input-group-text" id="addon-wrapping">Изменить жанр</span>
                                                                <input class="form-control" list="genre" placeholder="Введите для поиска..." value="{{$game->genre}}" name="genre">
                                                                <datalist id="genre">
                                                                    @foreach ($genres as $genre)
                                                                    <option value="{{$genre->name}}">
                                                                    @endforeach
                                                                </datalist>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning">Сохранить изменения</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <button title="Delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$game->id}}">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Модальное окно delete -->
                                        <form action="{{route('games.destroy', $game['id'])}}" method="post">
                                            @csrf
                                         @method('DELETE')
                                        <div class="modal fade" id="delete{{$game->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                           Удалить запись №{{$game->id}}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Закрыть"></button>
                                                    </div>
                                                    <div class="modal-body fs-3">
                                                        Вы уверены что хотите удалить <br>игру <b>{{$game->name}}</b> <br> студии разработчика <b>{{$game->studio}}</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Удалить</button>
                                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Отменить</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 m-2 d-flex justify-content-center">
             {{$games->links()}} 
            </div>
            <a href="{{route('home')}}">Выйти из таблицы</a>
            
        </div>
    </div>
</body>

</html>
