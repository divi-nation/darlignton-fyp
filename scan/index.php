<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <script src="https://cdn.jsdelivr.net/npm/jsQR@1.0.1/dist/jsQR.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="../css/index.css">

    <link rel="stylesheet" href="../css/scan.css">
</head>
<body>
    <div class="container cen">
        <div class="contents cen">
            <div class="extras cen">
                <i class="bi bi-arrow-left" onclick="location.href='../home/'"></i>
                <div class="icon cen"><i class="bi bi-arrow-clockwise"></i></div>
                <div class="icon cen" onclick="toggleFlashlight()"><i class="bi bi-lightning-charge"></i></div>
                <i class="bi bi-three-dots-vertical"></i>
            </div>
            <div class="preview cen" id="cameraPreview">
                <img src="../images/qr.gif" alt="" srcset="">
            </div>
        </div>
    </div>
 
    <script>
        const cameraPreview = document.getElementById('cameraPreview');
        let isFlashlightOn = false;

        // Access the device's camera and display the camera feed
        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
            .then(stream => {
                const videoElement = document.createElement('video');
                videoElement.srcObject = stream;
                videoElement.setAttribute('playsinline', true);
                videoElement.play();
                cameraPreview.appendChild(videoElement);
            })
            .catch(error => {
                console.error('Error accessing camera:', error);
            });

        // Function to handle QR code scanning
        function scanQRCode() {
            // Create a canvas element to capture video frame
            const canvasElement = document.createElement('canvas');
            const videoElement = document.querySelector('video');
            const context = canvasElement.getContext('2d');

            canvasElement.width = videoElement.videoWidth;
            canvasElement.height = videoElement.videoHeight;

            // Draw the current video frame onto the canvas
            context.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);

            // Extract QR code data from the canvas
            const imageData = context.getImageData(0, 0, canvasElement.width, canvasElement.height);
            const code = jsQR(imageData.data, imageData.width, imageData.height);

            if (code) {
                // If a QR code is detected, extract the URL from the QR code data
                const url = code.data;

                // Redirect the user to the extracted URL
                window.location.href = url;
            }
        }

        // Function to toggle flashlight
        function toggleFlashlight() {
            const constraints = { video: { facingMode: 'environment', torch: isFlashlightOn } };

            // Re-access the camera with updated constraints to toggle flashlight
            navigator.mediaDevices.getUserMedia(constraints)
                .then(stream => {
                    const videoTracks = stream.getVideoTracks();
                    videoTracks[0].applyConstraints({ advanced: [{ torch: !isFlashlightOn }] });

                    // Update button text and state
                    if (!isFlashlightOn) {
                        flashlightBtn.textContent = 'Turn Off Flashlight';
                    } else {
                        flashlightBtn.textContent = 'Turn On Flashlight';
                    }
                    isFlashlightOn = !isFlashlightOn;
                })
                .catch(error => {
                    console.error('Error accessing camera:', error);
                });
        }

        // Automatically scan for QR codes when the camera feed is available
        const scanInterval = setInterval(scanQRCode, 1000); // Adjust the interval as needed

        // Show SweetAlert popup after 10 seconds if no QR code is detected
        setTimeout(() => {
            Swal.fire({
                title: 'No QR code detected',
                text: 'Please try again or close this window.',
                icon: 'warning',
                showCloseButton: true,
                confirmButtonText: 'Close',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect the user to shop.html
                    window.location.href = '../shop/';
                }
            });
        }, 10000);
    </script>
</body>
</html>
