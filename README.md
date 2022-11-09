## Install

Run this command.
It will create docker containers for app-legacy and app-v3 automatically. It will also install Composer dependencies for each version target (/targets folder) through its respective container in order to manage the right PHP version with Composer.

```sh
composer install
```

## Architecture
- src/: common source code
    - Application/: common application code
    - Infrastructure/: core, adapters…
        - App/: application core
        - Build/: tools for build
        - HttpClient/: HTTP client adapter for Guzzle
- targets/: version targets folder (legacy/v3)
    - legacy:
        - src/: legacy source code
            - Application: link src/Application (common application code) content here + legacy application code
            - Infrastructure: link src/Infrastructure here
        - composer.json: for PHP 5.6.0            
    - v3
        - src/: v3 source code
            - Application: link src/Application (common application code) content here + v3 application code
            - Infrastructure: link src/Infrastructure here
        - composer.json: for PHP 7.2.5

## Docker
Docker containers are created automatically with **composer install**.
You can also launch composer install for those containers with Composer script
```sh
composer composer-install
```
```sh
composer composer-install-legacy
```
```sh
composer composer-install-v3
```
To access to your containers :
```sh
docker exec -ti app-legacy bash
```
or
```sh
docker exec -ti app-v3 bash
```


## Build
The zips will be generated in **builds/zip** folder.

**Run this command to build both versions**
```sh
make
```
or
```sh
make build
```
**To build a specific version**
```sh
make build-legacy
```
or
```sh
make build-v3
```