Friendly-Fitatu
===============

A Symfony Test project.

1. Clone repo
2. Install project dependencies
    - `composer install`
3. Set up DB parameters in app/config/parameters.yml
4. Prepare DB:
    - `php bin/console doctrine:database:create`
    - `php bin/console doctrine:migrations:migrate`
    - `php bin/console doctrine:fixtures:load`
5. Check project up and running
    - `php bin/console server:start`
    - `php vendor/bin/codecept run`

