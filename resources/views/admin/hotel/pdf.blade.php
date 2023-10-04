<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* تنسيق الجدول */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* تخصيص الألوان */
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Hotels </h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Descripitoin</th>
                <th>City id</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($key as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['descripitoin'] }}</td>
                <td>{{ $item['city_id'] }} </td>
            </tr>
               @endforeach
        </tbody>
    </table>
</body>
</html>



