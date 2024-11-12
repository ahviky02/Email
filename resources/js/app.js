import './bootstrap';
import $ from 'jquery';



$(document).ready(function () {

  $('#image').on('change',function(){
    const [file] = image.files
      if (file) {
        previewImage.src = URL.createObjectURL(file);
        $('#previewImage').css({
          'visibility': 'visible',
          'display': 'block'
      });
      
      }
  })


  $('.delete').on('click',function(){
    $.ajax({
      type: 'DELETE',
      url: '/delete/'+$(this).val(),
      data: {
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function (data) {
        window.location.reload();
      }
    });
  });

  $('#sendSearch').on('input', function () {
    $.ajax({
      type: 'GET',
      url: '/ajax-search-send',
      data: {
        search: $(this).val(),
        type: 'send'
      },
      success: function (res) {
        $('#sendTable tbody').empty();
          res.forEach(function (element) {
            $('#sendTable tbody').append(`
              <tr style="height: 30px;">
              <td>${element.receiver}</td>
              <td>${element.subject}</td>
              <td style="display: inline-block; width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${element.message}</td>
              <td>${Date(element.created_at)}</td>
              <td class="d-flex gap-3">
              <a href="/send-read?data=${encodeURIComponent(JSON.stringify(element))}" style="text-decoration: none; color: black">
                  <button class="btn btn-success">Open</button>
                  </a>
                  <button class="btn btn-danger delete" value="${element.id}">Delete</button>
              </td>
              </tr>
              `)
          });
      }
    });
  });

    $('#InboxSearch').on('input', function () {
        $.ajax({
            type: 'GET',
            url: '/ajax-search-inbox',
            data: {
                search: $(this).val(),
                type: 'inbox'
            },
            success: function (res) {
                $('#indoxTable tbody').empty(); // Corrected table ID from 'indoxTable' to 'inboxTable' if applicable
                res.forEach(element => {
                  
                    $('#indoxTable tbody').append(`
                        <tr style="height: 30px;">
                            <td>${element.sender}</td>
                            <td>${element.subject}</td>
                            <td style="display: inline-block; width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">${element.message}</td>
                            <td>${Date(element.created_at)}</td>
                            <td class="d-flex gap-3">
                            <a href="/index-read?data=${encodeURIComponent(JSON.stringify(element))}" style="text-decoration: none; color: black">
                                <button class="btn btn-success">Open</button>
                                </a>
                                <button class="btn btn-danger delete" value="${element.id}">Delete</button>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });
    });
});