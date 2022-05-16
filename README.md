# clown4

faire tourner 2 terminaux:
# 1 
cd back4clown
cd public
php -S localhost:8787

# 2
cd front4clown
cd public
npm run serve


# "charger" la bdd :

=> dans env. : relier à ma la bdd
DATABASE_URL="mysql://root:@127.0.0.1:3306/clown4?serverVersion=5.7&charset=utf8mb4"

créer ddb 'clown4':
symfony console doctrine:database:create

créer le scema des tables dans la bdd:
symfony console doctrine:schema:update -f

ajouter les données en executant ce qu'il y a dans le dossier clown4.sql

