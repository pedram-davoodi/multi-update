# Multi-Update Package

The `pedram-davoodi/multi-update` package provides a convenient way to perform multi-row updates on a database table using Laravel's Eloquent ORM.

## Installation

You can install this package using Composer. Run the following command in your terminal:

```
composer require pedram/multi-update
```

## Usage

To use the `updateMultipleRows()` method provided by this package, you must first import the `PedramDavoodi\MultiUpdate\MultiUpdateable` trait in your model class. This trait provides the `updateMultipleRows()` method, which you can use to perform multi-row updates on the model's table.

Here's an example of how to call the `updateMultipleRows()` method:

```php
$params = [
    'column1' => [
        'value1' => 'condition1',
        'value2' => 'condition2'
    ],
    'column2' => [
        'value3' => 'condition3',
        'value4' => 'condition4'
    ]
];

$numRowsUpdated = MyModel::updateMultipleRows($params);
```

In this example, we've defined the `$params` array to update two columns (`column1` and `column2`) with multiple values based on different conditions. We've then created a new instance of `MyModel` and called the `updateMultipleRows()` method with the `$params` array. The method returns the number of rows affected by the update query.

## Contributing

If you find a bug or have a feature request, please open an issue on GitHub. Pull requests are welcome!

## License

This package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
