<!DOCTYPE html>
<html>

<head>
    <style>
        #print {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #print td,
        #print th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #print tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #print tr:hover {
            background-color: #ddd;
        }

        #print th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: lightblue;
            color: white;
        }
    </style>
</head>

<body>
    <h3>Covid19 Information</h3>
    <table id="print">
            <tr>
                <th>Country</th>
                <th>Confirmed</th>
                <th>Recovered</th>
                <th>Death</th>
            </tr>
        <tr>
            <td>{{$covid->country}}</td>
            <td>{{$covid->confirmed}}</td>
            <td>{{$covid->recovered}}</td>
            <td>{{$covid->death}}</td>

        </tr>

   
</table>