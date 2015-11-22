var username;

$(document).ready(function()
{
    username = $('#username').html();

    pullData();

    $(document).keyup(function(e) {
        if (e.keyCode == 13)
            sendMessage();
        else
            isTyping();
    });
});

function pullData()
{
    retrieveChatMessages();
    retrieveTypingStatus();
    setTimeout(pullData,3000);
}

function retrieveChatMessages()
{
    $.post('../public/retrieveChatMessages', {username: username}, function(data)
    {
        if (data.length > 0)
            $('#chat-window').append('<br><div>'+data+'</div><br>');
    });
}

function retrieveTypingStatus()
{
    $.post('../public/retrieveTypingStatus', {username: username}, function(username)
    {
        if (username.length > 0)
            $('#typingStatus').html(username+' is typing');
        else
            $('#typingStatus').html('');
    });
}

function sendMessage()
{
    var text = $('#text').val();

    if (text.length > 0)
    {
        $.post('../public/sendMessage', {text: text, username: username}, function()
        {
            $('#chat-window').append('<br><div style="text-align: right">'+text+'</div><br>');
            $('#text').val('');
            notTyping();
        });
    }
}

function isTyping()
{
    $.post('../public/isTyping', {username: username});
}

function notTyping()
{
    $.post('../public/notTyping', {username: username});
}
