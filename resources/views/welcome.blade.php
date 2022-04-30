<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        @foreach ($menu as $item)
        <li id="{{$item->id}}">
            <a href="{{$item->url}}">
                {{$item->text}}
            </a>
            @endforeach
            <ul>
                @foreach ($menuAll as $item)
                    @if ($item->parent_id)
                        <li>
                            <a href="{{$item->url}}">
                                {{$item->text}}
                            </a>
                        </li>
                    
                        
                    @endif
                @endforeach
            </ul>
        </li>
    </ul>
    

        
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <input type="text" name="text">
        <input type="text" name="url">
        <button type="submit">Tao Menu</button>
    </form>
</body>
</html>
