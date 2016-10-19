PHP class for format date after created.


## Install

```bash
composer require dmitry/date-ago
```

## Example

```php
$date = new DateAgo();
$date->current= strtotime("31.10.2011");
$date->agoPrint();
```

## License

MIT
