# Honeylex CMF

Project CMF template for building rapidly scalable applications based on the integration of the [Honeybee][Honeybee] CQRS & ES framework with the [Silex][Silex] micro framework based on Symfony components.

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
# don't forget to connect your shell with `eval $(docker-machine env default)`
composer docker:up
```

Now you can run commands to setup the project:
```shell
composer honeylex project:configure
composer honeylex migrate:up
composer honeylex fixture:import # import a default administrator account
```
**Once containers are running your project will be ready and provisioned!**
>Run `docker-machine ip default` to find the IP (typically http://192.168.99.100)
> - Secure site https://192.168.99.100 (untrusted certs in dev mode)
> - Elasticsearch admin at http://192.168.99.100:9100
> - CouchDB admin at http://192.168.99.100:5984/_utils
> - RabbitMQ admin at http://192.168.99.100:15672

*Login as a default administrator with email `admin@honeylex.dev` and password `admin` to access the user administration interface.*

You can add application secrets in the ```var/secrets``` folder of your docker machine. The `.env` and `var/docker/docker-compose.yml` files also contain additional global project environment and secrets configuration.

The following docker commands are available via `composer` from your host machine:
```shell
composer docker:up     # create and start containers
composer docker:down   # stop and remove containers
composer docker:start  # start previously stopped containers
composer docker:stop   # stop/suspend running containers
composer docker:prune  # remove dangling volumes and stopped containers
```

## Console

Honeylex-CMF comes with a number of convenient tools to help project setup and maintenance. A complete list of commands can be found by running:
```shell
composer honeylex  # alias of docker-compose run --rm php_cli ./bin/honeylex
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

The bootstrapped Silex app is configured with support for the following service providers:

* [AssetServiceProvider][AssetServiceProvider]
* [FormServiceProvider][FormServiceProvider]
* [LocaleServiceProvider][LocaleServiceProvider]
* [MonologServiceProvider][MonologServiceProvider]
* [SerializerServiceProvider][SerializerServiceProvider]
* [SessionServiceProvider][SessionServiceProvider]
* [ServiceControllerServiceProvider][ServiceControllerServiceProvider]
* [SwiftmailerServiceProvider][SwiftmailerServiceProvider]
* [TranslationServiceProvider][TranslationServiceProvider]
* [TwigServiceProvider][TwigServiceProvider]
* [UrlGeneratorServiceProvider][UrlGeneratorServiceProvider]
* [ValidatorServiceProvider][ValidatorServiceProvider]
* [WebProfilerServiceProvider][WebProfilerServiceProvider]

Additional security services are provided in the included [Hlx\Security](https://github.com/honeylex/hlx-security) crate:

* [RememberMeServiceProvider][RememberMeServiceProvider]
* [SecurityServiceProvider][SecurityServiceProvider]

Read the [Providers][Providers] documentation for more details about Silex Service Providers.

## Questions?

Join us in building awesome scalable applications or ask questions here:
 - Gitter [honeybee #Lobby](https://gitter.im/honeybee/Lobby)
 - IRC [freenode #honeybee](http://webchat.freenode.net?randomnick=1&channels=%23honeybee&uio=d4)

[AssetServiceProvider]: http://silex.sensiolabs.org/doc/providers/asset.html
[Composer]: http://getcomposer.org/
[Docker]: https://docs.docker.com/engine/installation/
[FormServiceProvider]: http://silex.sensiolabs.org/doc/providers/form.html
[Honeybee]: http://github.com/honeybee/honeybee
[LocaleServiceProvider]: http://silex.sensiolabs.org/doc/master/providers/locale.html
[MonologServiceProvider]: http://silex.sensiolabs.org/doc/providers/monolog.html
[Providers]: http://silex.sensiolabs.org/doc/providers.html
[RememberMeServiceProvider]: http://silex.sensiolabs.org/doc/2.0/providers/remember_me.html
[SecurityServiceProvider]: http://silex.sensiolabs.org/doc/providers/security.html
[SerializerServiceProvider]: http://silex.sensiolabs.org/doc/2.0/providers/serializer.html
[SessionServiceProvider]: http://silex.sensiolabs.org/doc/master/providers/session.html
[ServiceControllerServiceProvider]: http://silex.sensiolabs.org/doc/providers/service_controller.html
[Silex]: http://silex.sensiolabs.org/documentation
[SwiftmailerServiceProvider]: http://silex.sensiolabs.org/doc/providers/swiftmailer.html
[TranslationServiceProvider]: http://silex.sensiolabs.org/doc/providers/translation.html
[TwigServiceProvider]: http://silex.sensiolabs.org/doc/providers/twig.html
[UrlGeneratorServiceProvider]: http://silex.sensiolabs.org/doc/providers/url_generator.html
[ValidatorServiceProvider]: http://silex.sensiolabs.org/doc/providers/validator.html
[WebProfilerServiceProvider]: http://github.com/silexphp/Silex-WebProfiler
