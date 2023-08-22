document.querySelector("#scanQRButton").addEventListener("click", async () => {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({
            video: true,
        });

        const videoElement = document.querySelector("#cameraFeed");
        videoElement.srcObject = stream;

        // Lakukan sesuatu dengan stream, seperti menampilkan kamera di elemen video
    } catch (error) {
        console.error("Error accessing camera:", error);
    }
});
