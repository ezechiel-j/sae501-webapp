# SAÉ501 Web Application

# Collaboration avec GitHub

Ce guide fournit les étapes essentielles pour collaborer efficacement sur ce projet en utilisant GitHub.

## Configuration initiale

1. Cloner le dépôt :

    ```
    git clone https://github.com/utilisateur/nom-du-repo.git
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

4. Créer une Pull Request sur GitHub pour fusionner vos modifications.

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
