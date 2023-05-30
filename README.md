# Multi-Update Package

The `pedram-davoodi/multi-update` package provides a convenient way to perform multi-row updates on a database table using Laravel's Eloquent ORM.

## Installation

You can install this package using Composer. Run the following command in your terminal:

```
composer require pedram-davoodi/multi-update
```

## Usage

To use the `multiUpdate()` method provided by this package, you must first import the `PedramDavoodi\MultiUpdate\MultiUpdateTrait` trait in your model class. This trait provides the `multiUpdate()` method, which you can use to perform multi-row updates on the model's table.

Here's an example of how to use the `multiUpdate()` method:

```php
use PedramDavoodi\MultiUpdate\MultiUpdateTrait;

class MyModel extends Model
{
    use MultiUpdateTrait;

    // ...

    public function updateMultipleRows($params)
    {
        return $this->multiUpdate($params);
    }
}
```

In this example, we've imported the `MultiUpdateTrait` trait and used it in our `MyModel` class. We've also defined a new method called `updateMultipleRows()` that calls the `multiUpdate()` method with the given parameters.

The `$params` parameter is an associative arraythat describes the updates to be performed. The keys of the array should be the names of the columns to be updated. The values of the array should be nested associative arrays, where the keys are the new values to set, and the values are the conditions to match for each new value.

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
