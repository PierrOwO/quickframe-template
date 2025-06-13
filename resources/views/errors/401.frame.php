<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Błąd 401</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }
        body{
            background-color: #3B82F6;
            overflow: hidden;
        }
        .message{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            width: 500px;
            height: 400px;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            overflow: hidden;
        }
        .message .content{
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            
            
        }
        .message .content .header{
            display: flex;
            font-size: 50px;
            width: 100%;
            align-items: left;
            font-weight: bold;
            height: 50px;
            color: #3B82F6;

        }
        .message .content .header a{
            padding-left: 10px;
            padding-top: 10px;
        }
        .message .content .body{
            display: flex;
            height: 280px;
            font-size: 18px;
            color: black;
            width: 100%;
            align-items: left;
            font-weight: bold;
        }
        .message .content .body a{
            padding-top: 40px;
            padding-left: 10px;
        }
        .message .content .footer{
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .message .content .footer button{
            height: 44px;
            width: 200px;
            border-radius: 4px;
            background-color: #3B82F6;
            color: white;
            border: none;
            cursor: pointer;
        }
        .message .content .footer button:hover{
            background-color:rgb(47, 99, 184);
        }
        .message .content .footer button:active{
            background-color:rgb(41, 84, 152);
        }

    </style>
</head>
<body>
    <div class="message">
        <div class="content">
            <div class="header">
                <a>Błąd 401</a>
            </div>
            <div class="body">
                <a>{{ $message }}</a>
            </div>
            <div class="footer">
                <button onclick="homePage()">Powrót na strone główną</button>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function homePage(){
        window.location.replace('/home');
    }
</script>