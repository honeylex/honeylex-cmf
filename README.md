# Honeylex CMF

Project CMF template for building rapidly scalable applications based on the integration of the [Honeybee][Honeybee] CQRS & ES library with the [Silex][Silex] micro framework.

####Alternative Honeybee Integrations
 - [Honeylex](https://github.com/honeylex/honeylex) (Honeylex)
 - [Honeyquip](https://github.com/honeyquip/honeyquip) (Honeybee + [Equip](https://github.com/equip/framework))
 - [Honeygavi](https://github.com/honeybee/honeybee-agavi-cmf-project) (Honeybee + [Agavi](https://github.com/agavi/agavi))

## Installation

### Docker

You can have Honeylex running very quickly with [Docker][Docker]. 
> If you do not already have Docker, first install it and have it running, then [create a machine](https://docs.docker.com/machine/get-started/) with [Virtualbox](https://www.virtualbox.org/) as required.

Build a Honeylex project on Docker as follows:
```shell
git clone git@github.com:honeylex/honeylex-cmf.git your-project
cd your-project
composer docker:build
```

Now you can connect to the web server container and run commands to setup the project:
```shell
# NOTE! docker may sanitize your container prefix, removing punctuation etc.
docker exec -it -u 1000 yourproject_web_1 bash
cd /var/www
composer install
bin/console hlx:project:install
bin/console hlx:migrate:up
bin/console hlx:fixture:import # creates a default adminstrator
```
Your site will then be available at the IP address of your base machine (typically http://192.168.99.100) and you can login as a default administrator with username and password `admin`.

You can also configure various environment files in the ```your-project/var/docker/conf``` folder of your host machine.

The following docker commands are available via `composer` from your host machine:
```shell
composer docker:build # provision a container set for a Honeylex project
composer docker:up    # bring up the containers without building
composer docker:down  # stops and removes the project containers
composer docker:start # start previously stopped containers
composer docker:stop  # stop/suspend the docker containers
```

### Local

In order to get Honeylex running without virtualization you'll need to make sure that your machine meets the following requirements:

* PHP >= 5.6
* [Composer][Composer]
* [Elasticsearch 2.x](https://www.elastic.co/downloads/elasticsearch)
* [Couchdb 1.6.x](http://couchdb.apache.org)
* [Rabbitmq](https://www.rabbitmq.com) - Only required if you want support for async background processing.

#### Install:

* Run: ```composer create-project -sdev honeylex/honeylex-cmf your-project```
* Install: ```cd your-project; bin/console hlx:project:install```
* Create a directory: ```/usr/local/honeylex.local/```
* In this directory create a file named ```rabbitmq.json``` with the following contents: ```{ "user":"name", "password":"secret", "host": "localhost", "port": 5672 }```
* Run: ```bin/console hlx:migrate:up```
* Run: ```composer run```, this will start a local webserver that hosts the app [here](http://localhost:8888/)


## Console

A full list of supported console commands for scaffolding crates and resources, managing migrations and more can be found by running:
```shell
bin/console
```

### Registered silex service providers

The bootstrapped Silex app is configured with the following service providers:

* [AssetServiceProvider][AssetServiceProvider]
* [FormServiceProvider][FormServiceProvider]
* [LocaleServiceProvider][LocaleServiceProvider]
* [MonologServiceProvider][MonologServiceProvider]
* [ServiceControllerServiceProvider][ServiceControllerServiceProvider]
* [TranslationServiceProvider][TranslationServiceProvider]
* [TwigServiceProvider][TwigServiceProvider]
* [UrlGeneratorServiceProvider][UrlGeneratorServiceProvider]
* [ValidatorServiceProvider][ValidatorServiceProvider]
* [WebProfilerServiceProvider][WebProfilerServiceProvider]
* [SwiftmailerServiceProvider][SwiftmailerServiceProvider]

Read the [Providers][Providers] documentation for more details about Silex Service Providers.

## Questions?

Feel free to join us and ask questions in the [#honeybee](http://webchat.freenode.net?randomnick=1&channels=%23honeybee&uio=d4) channel on [freenode](https://freenode.net/).

[AssetServiceProvider]: http://silex.sensiolabs.org/doc/providers/asset.html
[Composer]: http://getcomposer.org/
[Docker]: https://docs.docker.com/engine/installation/
[FormServiceProvider]: http://silex.sensiolabs.org/doc/providers/form.html
[Honeybee]: http://github.com/honeybee/honeybee
[LocaleServiceProvider]: http://silex.sensiolabs.org/doc/master/providers/locale.html
[MonologServiceProvider]: http://silex.sensiolabs.org/doc/providers/monolog.html
[Providers]: http://silex.sensiolabs.org/doc/providers.html
[ServiceControllerServiceProvider]: http://silex.sensiolabs.org/doc/providers/service_controller.html
[Silex]: http://silex.sensiolabs.org/documentation
[SwiftmailerServiceProvider]: http://silex.sensiolabs.org/doc/providers/swiftmailer.html
[TranslationServiceProvider]: http://silex.sensiolabs.org/doc/providers/translation.html
[TwigServiceProvider]: http://silex.sensiolabs.org/doc/providers/twig.html
[UrlGeneratorServiceProvider]: http://silex.sensiolabs.org/doc/providers/url_generator.html
[ValidatorServiceProvider]: http://silex.sensiolabs.org/doc/providers/validator.html
[WebProfilerServiceProvider]: http://github.com/silexphp/Silex-WebProfiler
