# PHP Include and Form Validation Activity

This project converts the portfolio laboratory exercise into a modular PHP website.

## File organization

- `index.php` loads the page through four PHP includes.
- `header.php` contains the document head and opening page elements.
- `navigation.php` contains the navigation bar.
- `main.php` contains the home, about, projects, and contact sections.
- `footer.php` contains the footer, Bootstrap script, and closing page elements.
- `validation.php` contains reusable PHP regular-expression validation helpers.
- `login.php` and `register.php` process submitted form data on the server.

## Run locally

From this folder, start a local PHP server:

```text
php -S localhost:8000
```

Then open `http://localhost:8000/index.php`.

To demonstrate validation, submit invalid and valid values on both `login.php` and
`register.php`. The forms display server-side error or success messages.
