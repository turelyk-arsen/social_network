$(document).ready(function() {
    $('.like-icon').click(function() {
        var postId = $(this).data('post-id');
        var likeCount = $('.like-count[data-post-id="' + postId + '"]');
        
        $.post('/posts/' + postId + '/like', function(response) {
            if (response.success) {
                likeCount.text(response.likeCount);
            }
        });
    });

    $('.dislike-icon').click(function() {
        var postId = $(this).data('post-id');
        var dislikeCount = $('.dislike-count[data-post-id="' + postId + '"]');
        
        $.post('/posts/' + postId + '/dislike', function(response) {
            if (response.success) {
                dislikeCount.text(response.dislikeCount);
            }
        });
    });
});

// $(document).ready(function() {
//     // Обробка кліку на лайк
//     $('.like-icon').click(function() {
//         var postId = $(this).data('post-id');
//         var url = '/like/' + postId;

//         $.ajax({
//             type: 'POST',
//             url: url,
//             data: { type: 'like' },
//             success: function(response) {
//                 // Оновлюємо відображення лайків
//                 $('.like-count').text(response.likeCount);
//             },
//             error: function() {
//                 alert('Сталася помилка при обробці вашого запиту.');
//             }
//         });
//     });

//     // Обробка кліку на дизлайк
//     $('.dislike-icon').click(function() {
//         var postId = $(this).data('post-id');
//         var url = '/like/' + postId;

//         $.ajax({
//             type: 'POST',
//             url: url,
//             data: { type: 'dislike' },
//             success: function(response) {
//                 // Оновлюємо відображення дизлайків
//                 $('.dislike-count').text(response.dislikeCount);
//             },
//             error: function() {
//                 alert('Сталася помилка при обробці вашого запиту.');
//             }
//         });
//     });
// });

