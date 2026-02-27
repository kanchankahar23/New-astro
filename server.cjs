const { createServer } = require("http");
const { Server } = require("socket.io");

const httpServer = createServer();
const io = new Server(httpServer, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});
const users = {};
io.on("connection", (socket) => {
    socket.on("join-room", ({ roomId, userId }) => {
        users[userId] = socket.id;
        socket.join(roomId);
        console.log(`👤 User ${userId} joined room ${roomId}`);
    });
    socket.on("call-user", ({ offer, targetUserId, senderUserId }) => {
        const targetSocket = users[targetUserId];
        if (targetSocket) {
            io.to(targetSocket).emit("call-user", { offer, senderUserId });
        }
    });
    socket.on("answer-call", ({ answer, targetUserId, senderUserId }) => {
        const targetSocket = users[targetUserId];
        if (targetSocket) {
            io.to(targetSocket).emit("answer-call", { answer, senderUserId });
        }
    });
    socket.on("ice-candidate", ({ candidate, targetUserId, senderUserId }) => {
        const targetSocket = users[targetUserId];
        if (targetSocket) {
            io.to(targetSocket).emit("ice-candidate", { candidate, senderUserId });
        }
    });
    socket.on("disconnect", () => {
        for (const [uid, sid] of Object.entries(users)) {
            if (sid === socket.id) {
                delete users[uid];
                console.log(`❌ User ${uid} disconnected`);
                break;
            }
        }
    });
});

httpServer.listen(3000, () => {
    console.log("🚀 Socket.IO server running on port 3000");
});
