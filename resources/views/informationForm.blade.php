<!DOCTYPE>
<html>
    <head>
        <title>Information Form Interface</title>
        <style>
            h1{
                align:center;
            }
        </style>
    </head> 
    <body>
        <h1>Please fill in the table below:</h1>
        <br>
        <form action ="submit" method="post">
        @csrf 
        <table border = 0 align ="center">
            <tr>
                <td>Computer Owner:</td>
                <td><input type="text" name="compOwner" placeholder="Name"></td>
            </tr>
            <tr>
                <td>Computer Model:</td>
                <td><input type="text" name="compModel" placeholder="Model's name"></td>
            </tr>
            <tr>
                <td>Date of Computer Warranty End:</td>
                <td><input type="date" name="warrantyDate"></td>
            </tr>
            <tr>
                <td>Frequency of the problem happened:</td>
                <td><input type="integer" name="problemsFrequency" placeholder="0-10"></td>
            </tr>
            <tr>
                <td>Problem's detail:</td>
                <td><input type="text" name="problemsReported" placeholder="Description"></td>
            </tr>
            <tr>
            <td><input type="submit"></td>
            </tr>
        </table>
    </body>
</html>