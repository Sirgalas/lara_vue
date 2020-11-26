const http =require('http').Server();
const io=require('socket.io')(http);
const Redis = require('ioredis');

let redis = new Redis({
    port: 6379,
    host: "redis",
});


redis.subscribe('chart-channel',function (err, count) {
    if(err){
        console.log(err);
    }
    console.log(count);
});
redis.subscribe('chat-message',function (err, count) {
    if(err){
        console.log(err);
    }
    console.log(count);
});


redis.on('message', (channel, message) => {
    message=JSON.parse(message);
    console.log(channel);
    io.emit(channel, message.data);
});
http.listen(3000, function() {
    console.log('listening on *:3000')
});
