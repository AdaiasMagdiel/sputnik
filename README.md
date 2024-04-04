 # Sputnik

Sputnik is a simple URL shortener project that allows users to shorten links and redirect to the original URL using the shortened link. The project is in its early stages and only has the main functionality implemented.

## Getting Started

You can clone the project from the Github repository at https://github.com/AdaiasMagdiel/sputnik and run it using the integrated PHP server.

```bash
git clone https://github.com/AdaiasMagdiel/sputnik.git
cd sputnik
php -S localhost:8000 -t public
```

## Configuration

The project uses an SQLite database by default, but users can edit the following values in the Config class located in the src/Config.php file:

- $dsn: Database connection string
- $user: Database username
- $password: Database password

## Future Plans

In the future, I plan to create an API based on this project and implement many improvements and new features. Feel free to contribute and suggest ideas for the project.

## Changelog

Please check the [CHANGELOG.md](CHANGELOG.md) file to keep track of the changes in the project.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
