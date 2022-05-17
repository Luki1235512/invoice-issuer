App for issuing invoices

1. To run this app locally:

- Set your database in `.env`
- run `composer install`
- run `npm update`
- run `npm run watch`

2. For database setup:

- run `symfony.exe console doctrine:database:create`
- run `symfony.exe console doctrine:schema:update --force`

3. To fill database with two sample invoices:

- run `symfony.exe console doctrine:fixtures:load`

4. To start app:

- run `symfony.exe server:start`

Main Page: 

![inv1](https://user-images.githubusercontent.com/49656590/168811345-fc03cb0d-57cb-4846-9872-48c29803d666.png)

Details page:

![inv2](https://user-images.githubusercontent.com/49656590/168811385-5d65f373-75c8-4834-ae99-3b4ffd1b8b7e.png)

Create page:

![inv3](https://user-images.githubusercontent.com/49656590/168811439-750dd85b-a571-41c1-95b0-67a0a57d478f.png)

Invoice downloaded as pdf:

![inv4](https://user-images.githubusercontent.com/49656590/168811507-53313344-445c-475d-92eb-9c6dc741ad77.png)

