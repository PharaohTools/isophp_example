var app = require('express')() ;

app.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
});

var http = require('http').Server(app) ;
var io = require('socket.io')(http) ;

io.on('connection', function(socket){
    socket.on('chat message', function(msg){
        console.log('current message is', msg) ;
        io.emit('chat update', msg);
    });
});

http.listen(3000, function(){
    console.log('listening on *:3000');
});
