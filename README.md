# Say a joke

Say a joke by your code.

## Installation

Installing using composer:

```bash
composer require moaalaa/say-a-joke
```

## Usage

```php
use MoaAlaa\SayAJoke\JokeFactory;

$joke = (new JokeFactory())->getRandomJoke();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)