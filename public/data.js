//function which select right data from json and convert and edit to final version
function json_edit(element) {
  const regex = /-/gi;
  var new_element = document.createElement('div');
  $.each(element.categories, function (index, item) {
    const listItem = document.createDocumentFragment();
    listItem.textContent = element.categories[index].name;
    var nameCapitalized =
      listItem.textContent.charAt(0).toUpperCase() +
      listItem.textContent.slice(1);
    nameCapitalized = nameCapitalized.replace(regex, ' ');
    if (index < element.categories.length - 1) {
      listItem.textContent = nameCapitalized + ',' + ' ';
    } else {
      listItem.textContent = nameCapitalized;
    }
    new_element.appendChild(listItem);
  });
  return new_element;
}

//get url and connect with services to optain data
function get_results() {
  var my_domain =
    'http://localhost/Marketing_Standard/Karolina_R0012E_microservice/public/';
  //'https://testing-test-2.tk/Karolina_R0012E_microservice/';
  var https = 'https://';
  var php_path = '../src/services/';
  var url = document.getElementById('enter_url').value;

  if (url == '') {
    alert('Please input a Value');
    return false;
  } else {
    //button disabled when loading data
    $('.submit').addClass('cliked');
    document.getElementById('url').disabled = true;

    var web_server, widgets, CMS, web_location, google_analytics, reCAPTCHA;
    $.when(
      $.getJSON(my_domain + php_path + 'server.php?url=' + url, function (
        data
      ) {
        if (typeof data.groups != 'undefined') {
          web_server = json_edit(data.groups[0]);
          widgets = json_edit(data.groups[5]);
        } else {
          web_server = 'Data unavalible';
          widgets = 'Data unavalible';
        }
      }),

      $.get(php_path + 'CMS_server.php?url=' + url, function (data_CMS) {
        CMS = data_CMS;
      }),

      // $.get(php_path + 'country_server.php?url=' + url, function (
      //   data_country
      // ) {
      //   web_location = data_country;
      // }),

      $.get(php_path + 'get_html_data.php?url=' + https + url, function (
        get_html_data
      ) {
        get_html_data = JSON.parse(get_html_data);
        google_analytics = get_html_data[0];
        reCAPTCHA = get_html_data[1];
      })
      //display elements
    ).then(function () {
      if (
        (web_server, widgets, CMS, google_analytics, reCAPTCHA) //web_location
      ) {
        $('#board').before('<div class="title">Results</div>');
        $('<div id=board_results></div>').replaceAll('#board');
        $('#board_results').html('<b>URL:</b> ' + url + '<br><br>');
        $('#board_results').append('<b>Metric Result<br><br></b>');
        $('#board_results').append('<b>Web Server: </b>');
        $('#board_results').append(web_server);
        $('#board_results').append('<br><b>Web server location: </b>');
        $('#board_results').append(web_location);
        $('#board_results').append(
          '<br><b id="CMS">Content Menagement System: </b>'
        );
        $('#board_results').append(CMS);
        $('#board_results').append('<br><b>Widgets installed: </b>');
        $('#board_results').append(widgets);
        $('#board_results').append('<br><b>Google Analytics: </b>');
        $('#board_results').append(google_analytics);
        $('#board_results').append('<br><b>reCAPTCHA: </b>');
        $('#board_results').append(reCAPTCHA);
      } else {
        $('#board_results').html('<div>No data avaliable</div>');
      }
    });
  }
}
