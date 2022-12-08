# Phalcon Forms
## Check Group
Phalcon Form element to group Check inputs.

### Installation
Update your composer.json with following options:
```json
{
	"repositories": [
		{
			"type": "vcs",
			"url": "https://github.com/daleffe/phalcon-forms-checkgroup"
		}
	],
    "require": {
		  "daleffe/phalcon-forms-checkgroup": "dev-master",
    }
}
```
> I will check how to put this package in Packagist.org.

### Usage
In your forms class use:
``` php
use Daleffe\Phalcon\Forms\Element\CheckGroup;

$weekdaysList = array("1" => $this->translate->_('monday'), "2" => $this->translate->_('tuesday'), "4" => $this->translate->_('wednesday'), "8" => $this->translate->_('thursday'), "16" => $this->translate->_('friday'), "32" => $this->translate->_('saturday'), "64" => $this->translate->_('sunday'));

$weekdays = new CheckGroup("weekdays", ['elements' => $weekdaysList]);
$weekdays->setLabel($this->translate->_('weekdays'));
$weekdays->addValidators(array(
	new PresenceOf(array(
		'message' => $this->translate->_("weekdays_required")
	)),
));
// -> Edit
if (!is_null($timezones)) {
	foreach ($weekdaysList as $key => $value) {
		if ($timezones->weekdays & $key) {
			$weekdaysSelected[] = $key;
		}
	}
	$weekdays->setDefault($weekdaysSelected);
}

$this->add($weekdays);
```

New attribute has been added to allow the break line every 'n' checkboxes, as shown below:
```php
$weekdays = new CheckGroup("weekdays", ['elements' => $weekdaysList, 'linebreakeach' => 4]);
```


So, in view use:
```php
{{ form.render('weekdays') }}
```

This will make the Phalcon correctly apply the filters, validators and *bind()* method to persist in the database.
