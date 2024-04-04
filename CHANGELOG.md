## [v0.0.2] - 2024-04-03

### Added

-   Added `Response.php` class in the `AdaiasMagdiel\Sputnik\Classes` namespace.
    -   The `Response` class contains two static methods:
        -   `send()` to send an HTTP response with body, status code, and headers.
        -   `redirect()` to perform an HTTP redirect.
    -   The `send()` method sends the response body, status code, and headers.
    -   The `redirect()` method sets the appropriate status code (301 for permanent and 302 for temporary) and redirects to the specified URL.
-   Added a `template()` method in the `Controller.php` class.
    -   This method returns the rendered template using the `Engine` instance.
-   Added usage of `Response` class in `LinkController.php` for response handling.

### Changed

-   Updated `Controller.php`:
    -   Modified the visibility of the constructor method.
    -   Added the `template()` method to render templates.
-   Updated `LinkController.php`:
    -   Replaced `renderTemplate()` calls with `Response::send()` using the `template()` method for rendering.
    -   Changed response handling with `Response` class methods for sending responses and redirects.
-   Updated `LinkRepository.php`:
    -   Removed logic to check for existing identifiers before inserting.
    -   Adjusted the SQL query for inserting link and identifier.

### Removed

-   Removed redundant method call to `createTables()` in `LinkRepository.php`.

[v0.0.2]: https://github.com/AdaiasMagdiel/sputnik/compare/v0.0.1...v0.0.2
