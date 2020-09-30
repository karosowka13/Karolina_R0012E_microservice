# Microservices to check metrics of URL:

Simple web appliacation to find belowed metrics of a website:

| Metric            | Example                         |
|-------------------|---------------------------------|
| Web server        | Apache                          |
| Server location   | Germany                         |
| Using CMS?        | Wordpress                       |
| Widgets installed | Google font API, Contact form 7 |

Working of the application:
1. Request an URL in a text field
2. Show results of following metrics using open source libraries:.

## Perview of the website:

![](microservice.gif)

## Detailed descripcion:

The application is using api.builtwith.com to obtain web server, content management system and widgets installed  and ip-api.com for server location metrics. 

Microservices are written in PHP language in order to make request to reference tools and avoid CORS policy.
The script handles situation when data is unavailable and sends this information to the site.
Two libraries are used to obtain web server location and CMS. First is PEAR PHP library which was installed on the server by PHP PEAR Packages - Net_GeoIP. The second one was installed manually from github. 

The frontend consist of main HTML site which refers to CSS style document and JavaScript file.

The first one is a structure of an app. For this simple application it was unnecessary to use any grid library. In style sheet was used selector to make an animation on the button. The last one handles events and makes request to PHP servers. 

Function ‘jsons_edit’ work on data which was received to extract right parameter and deal with uppercase, lowercase letter, colons and spaces between words – just stylistic work.
Next one ‘get_results’ read the address written in the input and make requests by jquery library to our services. Then, function focuses on displaying the results on the website.


