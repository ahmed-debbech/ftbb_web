$(document).ready(function() {
    $('#ban').click(function() {
        $.get('http://127.0.0.1/ftbb_web/ftbb_web/public/index.php/admin/article/{{comment.articleId}}/ban/{{comment.id}}', function(data, status) {
            $('#passa').html("gogo");
            alert(status)
        });
    });
  });
  alert('ffff');