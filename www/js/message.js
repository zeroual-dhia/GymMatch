let messageButtons = document.querySelectorAll('.message button');
let messageContents = document.querySelectorAll('.message-content');

messageButtons.forEach((button) => {
    button.addEventListener('click', () => {
        // Get the ID of the clicked button's associated message
        let messageId = button.getAttribute('data-id');
        let messageContent = document.getElementById('message-' + messageId);
        
        // Toggle the display of the message content
        if (messageContent.style.display === 'none' || messageContent.style.display === '') {
            messageContent.style.display = 'block'; // Show the message content
        } else {
            messageContent.style.display = 'none'; // Hide the message content
        }
    });
});


