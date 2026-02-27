const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 3000 });

let users = {};

wss.on('connection', ws => {
    ws.on('message', message => {
        const data = JSON.parse(message);
        if (data.to && users[data.to]) {
            users[data.to].send(JSON.stringify(data));
        }
        if (data.from) {
            users[data.from] = ws;
        }
    });

    ws.on('close', () => {
        Object.keys(users).forEach(key => {
            if (users[key] === ws) {
                delete users[key];
            }
        });
    });
});

console.log("WebSocket server started on ws://178.16.137.177:3000");
