let copyButton = document.getElementsByTagName('button');
copyButton.addEventListener('click', function() {
    navigator.clipboard
        .writeText(document.getElementById('copy-text').value)
        .then(
            success => console.log("Text Copied"),
            err => console.log("Error Copying Text")
        );
});
