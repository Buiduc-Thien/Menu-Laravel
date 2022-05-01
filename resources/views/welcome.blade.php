<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <?
    show($menu)
   ?>
    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <input type="text" name="text" placeholder="name">
        <input type="text" name="url" placeholder="url" value="#">
        <select name="parent_id" id="">
            <option value="null">Null</option>
           <?
            showMenu($menu)
           ?>
        </select>
        <button type="submit">Tao Menu</button>
    </form>
</body>
</html>
<?
function showMenu($menu, $parent_id = null, $char = '')
{
    foreach ($menu as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            // Xử lý hiển thị chuyên mục
            // .....
            // .....
            // .....
            echo '<option value="'.$item->id.'">'.$char.$item->text.'</option>';
            // Xóa chuyên mục đã lặp
            unset($menu[$key]);
            
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showMenu($menu, $item->id, $char.' -- ');
        }
    }
}
// BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
function show($menu, $parent_id = null, $char = '')
{
    $cate_child = array();
    foreach ($menu as $key => $item)
    {   
        // item nao co parent = null
        if ($item->parent_id == $parent_id)
        {
            $cate_child[] = $item;
        }
    }
    if ($cate_child)
    {
        echo '<ul>';
            foreach ($cate_child as $key => $item)
            {
                // Hiển thị tiêu đề chuyên mục
                echo '<li>'.$item->text;
                    
                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            show($menu, $item->id, $char.' -- ');
            echo '</li>';
        }
        echo '</ul>';
    }
}
?>