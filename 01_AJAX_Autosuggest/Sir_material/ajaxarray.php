<!DOCTYPE html>
<html>
<head>
    <title>PHP Auto Suggest</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        #search{
            width: 300px;
            padding: 10px;
            font-size: 16px;
        }

        #suggestions{
            width: 322px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .item{
            padding: 10px;
            cursor: pointer;
            background: #fff;
        }

        .item:hover{
            background: #f0f0f0;
        }
    </style>
</head>
<body>

<h2>Auto Suggest Example</h2>

<input type="text" id="search" placeholder="Type a name..." onKeyUp="showSuggestion(this.value)">

<div id="suggestions"></div>

<script>
function showSuggestion(str)
{
    if(str.length == 0)
    {
        document.getElementById("suggestions").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            document.getElementById("suggestions").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "ajaxsuggest.php?q=" + str, true);
    xhr.send();
}
</script>

</body>
</html>