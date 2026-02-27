import { Server } from "socket.io";
import express from "express";
import http from "http";

const app = express();
const server = http.createServer(app);

const io = new Server(server, {
    cors: {
        origin: "https://creosmart-solutions.com", // Client's origin
        methods: ["GET", "POST"]
    }
});

app.get("/", (req, res) => {
    res.send(`Socket.IO Server is running.`);
});

io.on("connection", (socket) => {
    console.log("User connected:", socket.id);

    socket.on("joinRoom", ({ sender, receiver }) => {
        const room = `room_${Math.min(sender, receiver)}_${Math.max(sender, receiver)}`;
        console.log(`User ${sender} joining room ${room}`);
        socket.join(room);
    });

    socket.on("sendMessage", ({ sender, receiver, message }) => {
        const room = `room_${Math.min(sender, receiver)}_${Math.max(sender, receiver)}`;
        console.log(`Broadcasting message to room: ${room}`);
        io.to(room).emit("message", { sender, message });
    });

    socket.on("disconnect", () => {
        console.log("User disconnected:", socket.id);
    });
});

server.listen(3000, () => {
    console.log("Socket.IO server is running on http://localhost:3000");
});
