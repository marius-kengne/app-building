# App Building

Application de gestion des Buildings des organisations

## Getting started

1- Clonner le projet si c'est sur git ou dezipper si vous avez le .zip

2- Dans le fichier .env, renseigner les paramètres de votre base de données 
celle utilisée est app-building (a modifiée selon vos preférences)

3- Exécuter la commande : composer install 
pour installer les dépendances du projet coté php

4- exécuter la commande : php bin/console doctrine:fixtures:load
cela va générer les données fictives dans votre base de données

5- Exécuter la commande : npm install 
cela installera les dépendances de react se trouvant dans le fichier package.json

6- Exécuter la commande : npm run build
cela va permettre de compiler le project et fait l'instanciation des dépendances de l'application
et vous affichez les erreurs s'il y'en a

7- Si vous avez des erreurs, verifier votre version de node et npm et relancer le buil

8- Une fois tous cela fait, vous devez exécuter :

    * symfony serve : pour demarrer le backend symfony
    * npm run watch : pour demarer react


## Add your files

cd existing_repo
git remote add origin https://gitlab.com/tht4/app-building.git
git branch -M main
git push -uf origin main
```

## Integrate with your tools

- [ ] [Set up project integrations](https://gitlab.com/tht4/app-building/-/settings/integrations)

## Collaborate with your team

## Test and Deploy
##################### Listing des endpoints de l'application  ##########################


1. /api/piece/{id}
endpoint pour le nombre de personne d'une piece
    
2. /api/piece-building/{id}  
endpoint pour le listing des pieces d'un buiding 

3. /api/pieces
endpoint pour le listing de toutes les pieces

4. /api/building
endpoint pour le listing de tous les Buildings

5. /api/building/{id}
endpoint pour les informations détaillées d'un building

