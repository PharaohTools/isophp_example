var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

io.set('origins', '*:*');

io.on('connection', function(socket){
    socket.on('chat message', function(msg){
        console.log('current message is', msg) ;
        io.emit('chat update', msg);
    });
});

http.listen(3000, function(){
    console.log('listening on *:3000');
});
