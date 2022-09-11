<html>
<head>
	<meta content="chatbot" name="description">
	<meta name="author" content="Group 4">
     <link rel="stylesheet" href="style3.css"> 
<title>Helpdesk</title>

</head>
<body>
    <div class="m-box">
        <div class="default">
            <br>
             HELPDESK PROJECT
            <br>
        </div>
        <br>

        <div class = "chat-page">
            <div class = "msg-inox">
                <div class = "chats">
                    <div class = "user" >
                    <li> <?php
                        include 'user.php';
                        echo $msg;
                        ?>
                        </li>
                    </div>
                </div>
            </div>
        </div>

        <div class = "bot-page">
        <div class = "msg-outbox">
            <div class = "bot-chat">
                <div class = "bot" >
                <?php
                    include 'bot.php';
                    ?>
                
                </div>
            </div>
        </div>
    </div>


        
    <div class ="bottom">
        <div class ="input-group">
                <form method="post" action=" " >
                    <input name="message" type="text" class="msg" placeholder="Type here" style ="font-size: 20px; font-family: monospace;" required>
                    <input name="submit" type="submit" class="btn" value="Enter"><br>
                </form>
        </div>
    </div>
    

    </div>
</body>
</html>