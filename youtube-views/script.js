$(document).ready(function() {
    $('#openVideoBtn').click(function() {
      var videoLink = $('#videoLink').val();
      var count = $('#count').val();
      openVideoInNewTab(videoLink, count);
    });
  
    function openVideoInNewTab(videoLink, count) {
      for (var i = 0; i < count; i++) {
        window.open(videoLink);
      }
    }
  });
  