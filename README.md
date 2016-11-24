friendly-fitatu
===============

A Symfony project created on November 10, 2016, 5:54 pm.
# friendly-fitatu

- Clone repo
- Install dependencies
    - composer install
- Set up DB parameters in app/config/parameters.yml
- Prepare DB:
    - php bin/console doctrine:database:create
    - php bin/console doctrine:migrations:migrate
    - php bin/console doctrine:fixtures:load
- Check project up and running
    - php bin/console server:start
    - php vendor/bin/codecept run

