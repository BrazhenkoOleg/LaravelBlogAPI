<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск комментариев</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Поиск записей по тексту комментария</h1>

        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Введите не менее 3 символов" required minlength="3" value="{{ request('query') }}">
                <button class="btn btn-primary" type="submit">Найти</button>
            </div>
        </form>

        @if(request()->filled('query'))
            @if(count($results) > 0)
                <h4 class="mb-3">Результаты поиска:</h4>
                <div class="list-group">
                    @foreach($results as $post)
                        @foreach($post->comments as $comment)
                            <div class="list-group-item mb-2">
                                <h5 class="text-primary">{{ $post->title }}</h5>
                                <p class="mb-1">{{ $comment->content }}</p>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning">Ничего не найдено.</div>
            @endif
        @endif
    </div>
</body>
</html>
