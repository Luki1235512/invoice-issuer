

1. To run this app locally:

- Set your database in `.env`
- run `compeser install`
- run `npm update`
- run `npm run watch`

2. For database setup:

- run `symfony.exe console doctrine:database:create`
- run `symfony.exe console doctrine:schema:update --force`

3. To fill database with two sample invoices:

- run `symfony.exe console doctrine:fixtures:load`

4. To start app:

- run `symfony.exe server:start`
