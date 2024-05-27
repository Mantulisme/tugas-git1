<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title with Images in Corners</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 80%;
            height: 80%;
            border: 1px solid #000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
        }
        td {
            width: 50%;
            height: 50%;
            text-align: center;
            vertical-align: middle;
        }
        .title-cell {
            height: 20%; /* Adjust the height for the title row */
            text-align: center;
            vertical-align: middle;
            font-size: 2em;
            justify-content: center;
        }
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <td class="title-cell">Container Title</td>
            </tr>
            <tr>
                <td><img src="https://via.placeholder.com/100" alt="Image 1"></td>
                <td><img src="https://via.placeholder.com/100" alt="Image 2"></td>
            </tr>
            <tr>
                <td><img src="https://via.placeholder.com/100" alt="Image 3"></td>
                <td><img src="https://via.placeholder.com/100" alt="Image 4"></td>
            </tr>
        </table>
    </div>
</body>
</html>
