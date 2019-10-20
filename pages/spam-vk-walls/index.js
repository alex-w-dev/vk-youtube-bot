function spamVideo(element) {
  const uniqueGroups = [];
  $('#spam-video-groups')
    .val()
    .split(' ')
    .filter((group) => !!group)
    .forEach((group) => {
      if (!uniqueGroups.includes(group)) uniqueGroups.push(group)
    });
  console.log(uniqueGroups.join(' '), ' will sent to those groups');
  $('#video-list').hide();
  $.ajax( {
    url: '/api/vk/wall/post.php',
    method: 'POST',
    data: {
      attachments: element.id,
      message: $('#spam-video-text').val(),
      groups: uniqueGroups.join(' '),
    },
  }).done(function( data ) {
    $('#video-list').show();
    alert('Spammed ' + new Date());
  });
}

$(document).ready(() => {
  $('#spam-video-text')
    .val(localStorage.getItem('spamVideoText'))
    .keyup(() => {
      localStorage.setItem('spamVideoText', $('#spam-video-text').val());
    });
  $('#spam-video-groups')
    .val(localStorage.getItem('spamVideoGroups'))
    .keyup(() => {
      localStorage.setItem('spamVideoGroups', $('#spam-video-groups').val());
    });


  $.ajax( {
    url: '/api/vk/video/get.php',
  }).done(function( data ) {
    data.response.items.forEach((item) => {
      const videoItem = $(`
        <div class="video-item" onclick="spamVideo(this)" id="video${item.owner_id}_${item.id}">
          <img src="${item.image[0].url}" alt="item.title">
        </div>
      `);
      
      $('#video-list').append(videoItem);
    })
  });
});