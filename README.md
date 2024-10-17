# SAÉ501 Web Application

# Collaboration avec GitHub

Ce guide fournit les étapes essentielles pour collaborer efficacement sur ce projet en utilisant GitHub.

## Configuration initiale

1. Cloner le dépôt :

    ```
    git clone https://github.com/utilisateur/nom-du-repo.git
    ```

2. Configurer votre nom et email Git :
    ```
    git config user.name "Votre Nom"
    git config user.email "votre.email@exemple.com"
    ```

## Workflow de base

1. Créer une nouvelle branche pour votre fonctionnalité :

    ```
    git checkout -b nom-de-votre-fonctionnalite
    ```

2. Faire vos modifications et les commiter :

    ```
    git add .
    git commit -m "Description concise de vos modifications"
    ```

3. Pousser votre branche vers GitHub :

    ```
    git push origin nom-de-votre-fonctionnalite
    ```

4. Choisissez l'une des deux options suivantes :

    a) Créer une Pull Request (recommandé) :

    - Allez sur GitHub et créez une nouvelle Pull Request pour votre branche.
    - Cette méthode permet à d'autres développeurs d'examiner votre code avant qu'il ne soit fusionné.
    - Les reviewers peuvent laisser des commentaires, suggérer des modifications, et approuver les changements.
    - Une fois approuvée, la Pull Request peut être fusionnée dans la branche principale.

    b) Fusionner directement (à utiliser avec précaution) :

    - Si vous avez les permissions nécessaires et que le projet le permet, vous pouvez fusionner directement :
        ```
        git checkout main
        git merge nom-de-votre-fonctionnalite
        git push origin main
        ```
    - Cette méthode contourne le processus de revue de code, donc utilisez-la uniquement pour des changements mineurs ou urgents, selon les pratiques de votre équipe.

    ```

    ```

## Commandes Git utiles

### Gestion des branches

-   Voir la liste des branches locales :

    ```
    git branch
    ```

-   Voir la liste de toutes les branches (locales et distantes) :

    ```
    git branch -a
    ```

-   Changer de branche :

    ```
    git checkout nom-de-la-branche
    ```

-   Supprimer une branche locale :
    ```
    git branch -d nom-de-la-branche
    ```

### Mise à jour et synchronisation

-   Mettre à jour votre branche locale avec les changements distants :

    ```
    git pull origin nom-de-la-branche
    ```

-   Voir l'état de votre dépôt local :

    ```
    git status
    ```

-   Voir l'historique des commits :
    ```
    git log
    ```

### Gestion des modifications

-   Annuler les modifications non commitées :

    ```
    git checkout -- nom-du-fichier
    ```

-   Créer un commit de correction pour le dernier commit :
    ```
    git commit --amend
    ```

## Bonnes pratiques

-   Gardez vos commits atomiques et descriptifs.
-   Mettez à jour votre branche régulièrement avec la branche principale :
    ```
    git checkout main
    git pull origin main
    git checkout nom-de-votre-fonctionnalite
    git merge main
    ```
-   Utilisez des issues GitHub pour suivre les tâches et les bugs.
-   Demandez des revues de code avant de fusionner.

## Ressources utiles

-   [Documentation officielle de Git](https://git-scm.com/doc)
-   [Guide GitHub Flow](https://guides.github.com/introduction/flow/)
-   [Aide GitHub](https://help.github.com/)
