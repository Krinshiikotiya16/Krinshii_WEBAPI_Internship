<!DOCTYPE html>
<html>
<head>
    <title>Student search based on mode</title>

<style>

body{
    font-family:Arial, sans-serif;
    background:#B46A72;
    padding:40px;
}

h1{
    text-align:center;
    color:#0b1957;
    margin-bottom:30px;
    font-size:32px;
}

#mode{
    display:block;
    width:500px;
    margin:0 auto 30px;
    padding:18px;
    border:none;
    background-color:#f7f4ed;   /* Black */
    border-radius:10px;
    font-size:18px;
    box-shadow:0 4px 12px rgba(56, 52, 52, 0.15);
}

#result{
    width:90%;
    margin:auto;
}

table{
    width:90%;
    margin:30px auto;
    border-collapse:separate;
    border-spacing:8px;
    text-align:center;
    font-family:Arial, sans-serif;
}

th{
    color:white;
    padding:15px;
    font-size:17px;
    border-radius:12px;
}

td{
    padding:14px;
    background:white;
    border-radius:12px;
    font-weight:500;
    transition:0.3s;
}

/* Different Header Colors */
th:nth-child(1){
    background:#2D3A47;
}

th:nth-child(2){
    background:#2D3A47;
}

th:nth-child(3){
    background:#2D3A47;
}

th:nth-child(4){
    background:#2D3A47;
}

/* Hover Effect */
tr:hover td{
    transform:translateY(-4px);
    box-shadow:0 8px 15px rgba(0,0,0,0.15);
}

/* Different Column Colors */
td:nth-child(1){
    background:#C8D9E6;
}

td:nth-child(2){
    background:#FCE7F3;
}

td:nth-child(3){
    background:#FEF3C7;
}

td:nth-child(4){
    background:#D1FAE5;
}

</style>

    <script>
    function getData(Mode)
    {

        //check if nothing selected
        if(Mode=="")
        {
            document.getElementById("result").innerHTML="";
            return;
        }
        //onject
        var xhr = new XMLHttpRequest();

        //wait for response
        xhr.onreadystatechange = function()
        {
            //check req completed or not
            if(xhr.readyState == 4 && xhr.status == 200)
            {
                document.getElementById("result").innerHTML =
                xhr.responseText;
            }
        };

        //display
        xhr.open("GET","searchajax.php?Mode=" +Mode , true);
        xhr.send();
    }
    </script>

</head>
<body>

    <h1>---Internship Search Based On Mode---</h1>

    <select id="mode" onchange="getData(this.value)">
        <option value="">Select Internship Mode</option>
        <option value="Onsite">Onsite</option>
        <option value="Online">Online</option>
        <option value="Hybrid">Hybrid</option>
    </select>

<div id="result"></div>

</body>
</html>