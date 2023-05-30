# Multi-Update

Multi-Update is a laravel package that allows you to update multiple rows in a database table with a single SQL statement. This package is useful when you need to update multiple rows with different values based on different conditions.

## Installation

You can install Multi-Update using Composer. 

```bash
composer require pedram/multi-update
```

## Usage

To use Multi-Update, you need to call the `updateMultipleRows` method on a model or a query builder instance. This method takes two parameters: an array of fields and their corresponding values to update, and a variable-length argument list of conditions to apply to the update statement.

```php
use PedramD\MultiUpdate\MultiUpdate;

MyModel::updateMultipleRows($params, $condition1, $condition2, ...);
```

Here's an example of how you can use Multi-Update to update multiple rows in a database table:

```php
use PedramD\MultiUpdate\MultiUpdate;

MyModel::updateMultipleRows([
    'column1' => [
        'value1' => 'condition1',
        'value2' => 'condition2',
        'value3' => 'condition3',
    ],
    'column2' => [
        'new_value' => 'condition4',
    ],
], 'column5 > 0', 'column6 = "some_value"');
```

In the above example, we are updating two columns `column1` and `column2`. The `column1` is updated based on three different conditions, and the `column2` is updated based on one condition. We have also added two additional conditions to apply to the update statement.

## Contributing

Contributions to Multi-Update are welcome and encouraged! If you find a bug or have a feature request, please open an issue on the GitHub repository. If you would like to contribute code, please fork the repository and submit a pull request.

When submitting a pull request, please make sure to follow the PSR-2 coding standards and include tests for any new functionality or bug fixes.

## License

Multi-Update is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
