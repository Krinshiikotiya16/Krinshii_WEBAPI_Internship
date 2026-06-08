<!DOCTYPE html>
<html>
<head>
    <title>Student Auto Suggest</title>

    <style>

    body{
        font-family: Arial, sans-serif;
        margin:50px;
    }

    h2{
        color:#333;
    }

    #search{
        width:350px;
        padding:10px;
        font-size:16px;
        border:1px solid #ccc;
        border-radius:5px;
    }

    #result{
        width:372px;
        border:1px solid #ccc;
        border-top:none;
        max-height:250px;
        overflow-y:auto;
    }

    .item{
        padding:10px;
        cursor:pointer;
        border-bottom:1px solid #eee;
    }

    .item:hover{
        background:#f5f5f5;
    }

    .course{
        color:green;
        font-size:13px;
    }

    .city{
        color:#666;
        font-size:13px;
    }

    </style>

    <script>

    function getSuggestion(keyword)
    {
        if(keyword.length == 0)
        {
            document.getElementById("result").innerHTML = "";
            return;
        }

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function()
        {
            if(xhr.readyState == 4 && xhr.status == 200)
            {
                document.getElementById("result").innerHTML =
                xhr.responseText;
            }
        };

        xhr.open(
            "GET",
            "ajaxsearch.php?q=" + encodeURIComponent(keyword),
            true
        );

        xhr.send();
    }

    function selectStudent(name)
    {
        document.getElementById("search").value = name;
        document.getElementById("result").innerHTML = "";
    }

    </script>

</head>
<body>

    <h2>Student Auto Suggest</h2>

    <input
        type="text"
        id="search"
        placeholder="Enter Student Name..."
        autocomplete="off"
        onkeyup="getSuggestion(this.value)"
    >

    <div id="result"></div>

</body>
</html>