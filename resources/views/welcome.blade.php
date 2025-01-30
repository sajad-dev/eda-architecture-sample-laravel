<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel Echo WebSockets</title>
</head>

<body>
    <div id="box"></div>
    <input id="message" />
    <button onclick="sendClick()">Send</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        function sendClick() {
            axios.post("http://127.0.0.1:8000/send", {
                message: document.getElementById("message").value,
            }).then(response => {
                console.log(response.data);
            }).catch(error => {
                console.error("Error:", error);
            });
        }

        const pusher = new Pusher("d6kAd89bMqDrLrFh", {
            wsHost: "127.0.0.1",
            wsPort: 8081,
            forceTLS: false,
        });

        const channel = pusher.subscribe("test");
        channel.bind("publish", function (data) {
            const div = document.getElementById("box");
            const p = document.createElement("p");
            p.textContent = data.message;
            div.appendChild(p);
        });
    </script>
</body>

</html>