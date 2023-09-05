<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head></head>
    <body>
        <table>
            <tr>
                <th>Nama</th>
                <th>Catatan</th>
            </tr>
            @foreach ($guests as $guest)
            <tr>
                <td>{{ $guest['v_name'] }}</td>
                <td>{{ $guest['v_notes'] }}</td>
            </tr>
            @endforeach
        </table>
    </body>

    
</html>