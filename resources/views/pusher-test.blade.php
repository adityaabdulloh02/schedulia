<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusher Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Pusher Test Page</h1>
        <p>Buka console browser Anda untuk melihat status koneksi dan event yang diterima.</p>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Send Message</h5>
                <form id="message-form">
                    <div class="mb-3">
                        <input type="text" id="message-input" class="form-control" placeholder="Tulis pesan..." autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Received Messages</h5>
                <div id="messages" style="height: 200px; overflow-y: scroll; border: 1px solid #eee; padding: 10px;">
                    <!-- Messages will appear here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Pastikan file app.js Anda sudah mengkonfigurasi Laravel Echo -->
    @vite('resources/js/app.js')

    <script type="module">
        // Inisialisasi Echo setelah app.js dimuat
        setTimeout(() => {
            if (window.Echo) {
                console.log('Echo initialized. Waiting for connection...');

                window.Echo.channel('pusher-test-channel')
                    .listen('.pusher-test-event', (e) => {
                        console.log('Event received:', e);
                        const messagesDiv = document.getElementById('messages');
                        const messageEl = document.createElement('div');
                        messageEl.classList.add('alert', 'alert-info', 'mt-2');
                        messageEl.textContent = e.message;
                        messagesDiv.appendChild(messageEl);
                        messagesDiv.scrollTop = messagesDiv.scrollHeight;
                    });

                console.log("Listening on 'pusher-test-channel' for '.pusher-test-event'");

            } else {
                console.error("Laravel Echo is not defined. Pastikan konfigurasi di bootstrap.js sudah benar.");
            }
        }, 500);


        // Handle form submission
        document.getElementById('message-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const message = document.getElementById('message-input').value;

            fetch('/pusher/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message: message })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Send status:', data.status);
                document.getElementById('message-input').value = '';
            })
            .catch(error => console.error('Error sending message:', error));
        });
    </script>
</body>
</html>
