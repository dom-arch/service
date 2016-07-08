# <a name="title">DOMArch service [BETA]</a>

The DOMArch service context, no pages, private JSON API, encrypted urls & requests/response bodies, ... a business logic provider

## <a name="summary">Summary</a>
* [Installation](#installation)
* [Components](#components)
* [License](#license)

## <a name="installation">Installation :</a>

<strong>If you change the following example names, please adapt your `config.json`</strong>

* Firstly, install [DOMArch](https://github.com/dom-arch/dom-arch)
* Ensure PDO is enabled
* Clone this repository into your `entrypoints` directory
   `git clone https://github.com/dom-arch/service.git service`
* Add a host, like `service.domain.tld`, to your `hosts` file
* Create a database like `domain-tld-service`
* Go to the `sql` directory and execute each table script
* In a shell, go to your `service` directory and exectute the following commands :
  * `composer install -o`
  * `php cli/setup.php`

## <a name="components">Components :</a>

* [Entities](./doc/entities.md)
* [Lib](./doc/lib.md)
* [Modules](./doc/modules.md)
* [Repositories](./doc/repositories.md)

## <a name="license">License :</a>
This project is MIT licensed.

Copyright © 2015 - 2016 Lcf.vs
