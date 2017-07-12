<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <center>
    <h3>用户信息浏览</h3>
   <table width='700' border='1'>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>密码</th>
                <th>年龄</th>
                <th>性别</th>
                <th>操作</th>
            </tr>
            @foreach ($list as $v)
            <tr>
                <td align="center">{{ $v->uid }}</td>
                <td align="center">{{ $v->name }}</td>
                <td align="center">{{ $v->pass }}</td>
                <td align="center">{{ $v->age }}</td>
                <td align="center">
                    @if($v->sex == 1)
                        男
                    @else
                        女
                    @endif
                </td>
                <td align="center">
                    <a href="javascript:doDel({{$v->uid}})">删除</a>
                    |
                    <a href="/user/{{ $v->uid }}/edit">修改</a>
                </td>
            </tr>
            @endforeach

        </table>
    </center>
    </body>
</html>