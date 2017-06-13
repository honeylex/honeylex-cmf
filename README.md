# Honeylex CMF

Project CMF template for building rapidly scalable applications based on the integration of the [Honeybee][Honeybee] CQRS & ES framework with the [Silex][Silex] micro framework.

#### Alternative Honeybee Integrations
 - [Honeylex](https://github.com/honeylex/honeylex) (Honeylex core only)
 - [Honeyquip](https://github.com/honeyquip/honeyquip) (Honeybee + [Equip](https://github.com/equip/framework))
 - [Honeygavi](https://github.com/honeybee/honeybee-agavi-cmf-project) (Honeybee + [Agavi](https://github.com/agavi/agavi))

## Installation

### Docker

You can have Honeylex-CMF running very quickly with [Docker][Docker] and [Composer][Composer].
> If you do not already have Docker, first install it then [create a machine](https://docs.docker.com/machine/get-started/) with [Virtualbox](https://www.virtualbox.org/) if required.

Bring up the Honeylex-CMF project on Docker as follows:
```shell
git clone git@github.com:honeylex/honeylex-cmf.git your-project
cd your-project
composer install --ignore-platform-reqs
eval $(docker-machine env default)
docker-compose up -d
```

Now you can run commands to setup the project:
```shell
bin/honeylex project:configure
bin/honeylex migrate:up
bin/honeylex fixture:import # import a default administrator account
```
**Once containers are running your project will be ready and provisioned!**
>Run `docker-machine ip default` to find the IP (typically http://192.168.99.100)
> - Secure site https://192.168.99.100 (untrusted certs in dev mode)
> - Elasticsearch at http://192.168.99.100:9200
> - CouchDB admin at http://192.168.99.100:5984/_utils
> - RabbitMQ admin at http://192.168.99.100:15672

*Login as a default administrator with email `admin@honeylex.dev` and password `admin` to access the user administration interface.*

The `.env` and `var/docker/docker-composer.yml` files also allow additional global project environment configuration. You can also provide application secrets in the ```var/secrets``` folder.

The following docker commands can be used to manage your containers:
```shell
docker-compose up -d          # create and start containers
docker-compose down           # stop and remove containers
docker-compose start          # start previously stopped containers
docker-compose stop           # stop/suspend running containers
docker-compose logs php       # inspect container logs
docker-compose exec php bash  # start a bash session in a container
```

## Console

Honeylex-CMF comes with a number of convenient tools to help project setup and maintenance. A complete list of commands can be found by running:
```shell
bin/honeylex
```

A useful set of commands are provided for managing the following system features:
 - Configuration
 - Crates (portable code context bundles)
 - Resources (entities such as aggregate roots & projections)
 - Migrations
 - Fixtures
 - Workers (long running asynchronous background processes)
 - Events (managing the event store)
 - Routing

## Registered Silex service providers

The bootstrapped Silex app is configured with the following service providers:

* [AssetServiceProvider][AssetServiceProvider]
* [FormServiceProvider][FormServiceProvider]
* [LocaleServiceProvider][LocaleServiceProvider]
* [MonologServiceProvider][MonologServiceProvider]
* [SessionServiceProvider][SessionServiceProvider]
* [ServiceControllerServiceProvider][ServiceControllerServiceProvider]
* [TranslationServiceProvider][TranslationServiceProvider]
* [TwigServiceProvider][TwigServiceProvider]
* [UrlGeneratorServiceProvider][UrlGeneratorServiceProvider]
* [ValidatorServiceProvider][ValidatorServiceProvider]
* [WebProfilerServiceProvider][WebProfilerServiceProvider]
* [SwiftmailerServiceProvider][SwiftmailerServiceProvider]

Read the [Providers][Providers] documentation for more details about Silex Service Providers.

## Questions?

Join us in building awesome scalable applications or ask questions here:
 - IRC [freenode #honeybee](http://webchat.freenode.net?randomnick=1&channels=%23honeybee&uio=d4)
 - Gitter [honeybee #Lobby](https://gitter.im/honeybee/Lobby)
 - Slack [honeybee-cmf #development](https://honeybee-cmf.slack.com/messages/development)

[AssetServiceProvider]: http://silex.sensiolabs.org/doc/providers/asset.html
[Composer]: http://getcomposer.org/
[Docker]: https://docs.docker.com/engine/installation/
[FormServiceProvider]: http://silex.sensiolabs.org/doc/providers/form.html
[Honeybee]: http://github.com/honeybee/honeybee
[LocaleServiceProvider]: http://silex.sensiolabs.org/doc/master/providers/locale.html
[MonologServiceProvider]: http://silex.sensiolabs.org/doc/providers/monolog.html
[Providers]: http://silex.sensiolabs.org/doc/providers.html
[SessionServiceProvider]: http://silex.sensiolabs.org/doc/master/providers/session.html
[ServiceControllerServiceProvider]: http://silex.sensiolabs.org/doc/providers/service_controller.html
[Silex]: http://silex.sensiolabs.org/documentation
[SwiftmailerServiceProvider]: http://silex.sensiolabs.org/doc/providers/swiftmailer.html
[TranslationServiceProvider]: http://silex.sensiolabs.org/doc/providers/translation.html
[TwigServiceProvider]: http://silex.sensiolabs.org/doc/providers/twig.html
[UrlGeneratorServiceProvider]: http://silex.sensiolabs.org/doc/providers/url_generator.html
[ValidatorServiceProvider]: http://silex.sensiolabs.org/doc/providers/validator.html
[WebProfilerServiceProvider]: http://github.com/silexphp/Silex-WebProfiler
