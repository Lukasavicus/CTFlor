<!DOCTYPE html>
<html>
<head>
    <title>Chats</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/chat.css" rel="stylesheet">
</head>
<body>

    <div class="col-lg-4 col-lg-offset-4">
        <h1 id="greeting">
          Hello,
          <span id="username">Marcos Cavalcante</span>
        </h1>

        <div id="chat-window" class="col-lg-12">

        </div>
        <div class="col-lg-12">
            <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
            <input type="text" id="text" class="form-control col-lg-12" autofocus="" onblur="notTyping()">
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/chat.js"></script>
</body>
</html>
