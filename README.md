# web2pdf

Super simple barebones no-nonsense fast, quick and dirty script to convert web pages to PDF file using the wkhtmltopdf binary

## installation

Run `composer install` and then make sure the files in `vendor/bin` are executable and the `log` directory is writable:

```bash
composer install
chmod u+x vendor/bin/*
chmod u+x log
```

You might also need to install additional dependencies with:

```bash
sudo apt-get install wkhtmltopdf
```

## usage

Start the development server with:

```bash
php -S localhost:8000
```

Call the script with the required query string parameters `url` and `filename`, i.e.:

`http://localhost:8000/?url=http%3A%2F%2Fwww.google.com&filename=google+homepage`
