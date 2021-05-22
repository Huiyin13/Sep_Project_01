<h2>Customer Edit Request Draft</h2>
<title>Customer Edit Request Draft</title>
<style>
  table,th,td{
    text-align:center;
    border: 1px solid black;
  }
  button{
    background-color: rgb(140, 140, 175);
     color: white;
    padding: 10px 10px;
    margin: 4px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    opacity: 0.9;
  }
  button:hover{
    opacity: 2;
  }
</style>

<body>
    @foreach($data as $row)
        <h1>Please fill in the table below:</h1>
        <br>
        <form action ="submit" method="post">
        @csrf 
        <table border = 0 align ="center">
            <tr>
            <input type="hidden" name="custID" value="10001">
            <input type="hidden" name="reason" value="10002">
            <input type="hidden" name="estimatedCost" value="10003">
            <input type="hidden" name="confirmationStatus" value="10004">

                <td>Computer Owner:</td>
                <td><input type="text" name="compOwner" placeholder="Name" required></td>
            </tr>
            <tr>
                <td>Computer Model:</td>
                <td><input type="text" name="compModel" placeholder="Model's name" required></td>
            </tr>
            <tr>
                <td>Date of Computer Warranty End:</td>
                <td><input type="date" name="warrantyDate" required></td>
            </tr>
            <tr>
                <td>Frequency of the problem happened:</td>
                <td><input type="integer" name="problemsFrequency" placeholder="0-10" required></td>
            </tr>
            <tr>
                <td>Problem's detail:</td>
                <td><input type="text" name="problemsReported" placeholder="Description" required></td>
            </tr>
            <tr>
                <td>Do you want to submit this form?</td>
                <td>
                <select name="sendStatus" value ="2" placeholder ="Status" required>
                        <option>SAVE AS DRAFT</option>
                        <option>SUBMITTED</option> 
                </td>
            </tr>
            <tr>
            <td><input type="submit"></td>
            </tr>
        </table>
s      @endforeach
</body>

