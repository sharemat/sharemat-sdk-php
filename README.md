Sharemat PHP SDK
======================

PHP client for connecting to the Sharemat REST API.

Requirements
------------
- PHP 7.0 or greater
- cUrl extension enabled

Installation
------------

Use the following Composer command to install the SDK.
~~~shell
 $ composer require sharemat/php-sdk
 $ composer update
~~~

Namespace
---------

All the examples below assume the `Sharemat\Php\Sdk\Api` class is imported
into the scope with the following namespace declaration:

~~~php
use Sharemat\Sdk\Api;
~~~


Configuration
-------------

Provide your credentials to the dot env variables to prepare the API client
for connecting to a store on the Sharemat platform:

### Dot env
~~~bash
SHAREMAT_API_HOSTNAME=http://api.sharemat.local
SHAREMAT_API_ACCESS_TOKEN=12345
~~~

Accessing collections and resources (GET)
-----------------------------------------

To list all the resources in a collection:

~~~php
$api = new Api();
$equipments = $api->equipment()->getEquipments();

foreach ($equipments as $equipment) {
	echo $equipment->name;
}
~~~

To access a single resource and its connected sub-resources:

~~~php
$api = new Api();
$equipment = $api->equipment()->getEquipment(1);

echo $equipment->name;
~~~