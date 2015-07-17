web2pdf
=======

Super simple barebones no-nonsense fast, quick and dirty script to convert web pages to PDF file using the wkhtmltopdf binary

---

installation
------------

Run `composer install` and then make sure the files in `vendor/bin` are executable and the `log` directory is writable.

usage
-----

Call `index.php` with the required query string parameters `url` and `filename`, i.e.:

`http://local.dev/web2pdf/index.php?url=http%3A%2F%2Fwww.google.com&filename=google+homepage`
