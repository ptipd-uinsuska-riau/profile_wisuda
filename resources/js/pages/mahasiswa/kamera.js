let scanner = new Instascan.Scanner({ video: document.getElementById('scanner') });

scanner.addListener('scan', function(content) {
    alert('Scanned content: ' + content);
    scanner.stop(); // Stop scanning after successful scan
});

Instascan.Camera.getCameras().then(function(cameras) {
    if (cameras.length > 0) {
        scanner.start(cameras[0]); // Start scanning from the first available camera
    } else {
        console.error('No cameras found.');
    }
}).catch(function(error) {
    console.error('Error accessing cameras:', error);
});
