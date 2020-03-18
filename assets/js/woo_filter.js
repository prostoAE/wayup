$(function () {

  function getCats() {
    var cats = [];

    $('.wayup_filter_check input:checked').each(function () {
      var val = $(this).val();

      cats.push(val);
    });

    return cats;
  }

  function getPrices() {
    var inputValues = $('#price').val().split('-');
    var minPrice = inputValues[0].trim().slice(1);
    var maxPrice = inputValues[1].trim().slice(1);


    return [minPrice,maxPrice];
  }

  function wayup_order() {
    var order_by = $('.sort-menu li.active a').data('value');
    return order_by;
  }

  $('.wayup_filter_check input').on('change', wayup_get_posts);
  $('#slider-range span').mouseup(wayup_get_posts);

  //If pagination is clicked, load correct posts
  $(document).on('click', '.page-numbers', function(e){
    e.preventDefault();

    var url = $(this).attr('href'); //Grab the URL destination as a string
    var paged = url.split('&paged='); //Split the string at the occurance of &paged=
    // var page = paged[1].replace("/","");

    if (url.indexOf('&paged=')) {
      paged = url.split('&paged=');
    } else {
      paged = url.split('/page/');
    }

    wayup_get_posts(paged); //Load Posts (feed in paged value)
  });

  /*---------------------Sort menu------------------*/
/*  $('.sort-menu li').on('click', function () {
    var curentItem = $(this).find('a').html();
    var path = window.location.origin + window.location.pathname + '?orderby=' + $(this).find('a').data('value');
    sessionStorage.setItem('curentMenu', curentItem);
    $('#parametr').html($(this).find('a').html());
    window.location = path;
  });

  $(document).ready(function () {
    if (sessionStorage.getItem('curentMenu') && window.location.search) {
      $('#parametr').text(sessionStorage.getItem('curentMenu'));
    }
  });*/

  $('.sort-menu li').on('click', function () {
    var curentItem = $(this).find('a').html();
    $('.sort-menu li').removeClass('active');
    $(this).addClass('active');
    $('#parametr').text(curentItem);
    wayup_get_posts();
  });

  function wayup_get_posts(paged) {
    var paged_value = paged;
    var ajax_url = wayup_settings.ajax_url;

    $.ajax({
      type: 'GET',
      url: ajax_url,
      data: {
        action: 'wayup_filter',
        category: getCats,
        prices: getPrices,
        orderBy: wayup_order,
        paged: paged_value
      },
      beforeSend: function () {
        $('#products').html('Загрузка...');
        $('#product-pag').hide();
      },
      success: function (data) {
        $('#products').html(data);
      },
      error: function () {
        $('#products').html('<p>There has been an error</p>');
      }
    })
  }

});
