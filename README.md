# Documentation de l'API SAE501

Cette API permet de gérer les randonnées, les découvertes de plantes et d'animaux. Elle utilise l'authentification via Laravel Sanctum.

## Postman Collection

Vous retrouverez ci-joint l'accès rapide à la collection Postman vous permettant de tester les requêtes rapidement et facilement : [Postman Collection](https://www.postman.com/spaceflight-specialist-94457815/sae501/collection/5dr8t37/sae501?action=share&creator=35061547)

Il vous suffira uniquement de remplacer `votre-token` par le token d'accès que vous recevez lors de la connexion.

Vous trouverez également les détails de chaque requête dans la documentation ci-dessous.

## Table des matières

-   [Authentification](#authentification)
-   [Randonnées](#randonnées)
-   [Plantes](#plantes)
-   [Animaux](#animaux)
-   [Activités de randonnée](#activités-de-randonnée)

## Headers requis pour les routes protégées

Pour toutes les routes protégées, les headers suivants sont requis :
| Key | Value |
|--------|-------|
| Authorization | Bearer _votre-token_ |
| Accept | application/json |

## Authentification

### Inscription

**POST** `randoludique-back.sc1zeep6040.universe.wf/api/register`

Permet de créer un nouveau compte utilisateur.

-   **Body**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | name | string | Oui |
    | email | string | Oui |
    | password | string | Oui |
    | password_confirmation | string | Oui |

### Connexion

**POST** `randoludique-back.sc1zeep6040.universe.wf/api/login`

Permet de se connecter et récupérer un token d'accès.

-   **Body**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | email | string | Oui |
    | password | string | Oui |
-   **Réponse**:
    | Key | Value |
    |--------|-------|
    | token | string |
    | user.id | integer |
    | user.name | string |
    | user.email | string |

### Routes protégées

#### Déconnexion

**POST** `randoludique-back.sc1zeep6040.universe.wf/api/logout`

Permet de se déconnecter et révoquer le token d'accès.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |

#### Profil utilisateur

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/me`

Récupère les informations de l'utilisateur connecté.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |

#### Gestion du mot de passe

**POST** `randoludique-back.sc1zeep6040.universe.wf/api/reset-password`

Permet de réinitialiser le mot de passe de l'utilisateur.

-   **Query params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | email | string | Oui |
    | token | string | Oui |
    | password | string | Oui |
    | password_confirmation | string | Oui |

## Randonnées

### Routes publiques

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/hikes`

Récupère la liste des randonnées.

-   **Body**:
    | Key | Value |
    |--------|-------|
    | hike_id | integer |
    | hike_name | string |
    | hike_distance | float |
    | hike_duration | string |
    | hike_difficulty | 'easy', 'medium', 'hard' |
    | hike_start_point_return | 'false', 'true' |
    | search | string |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/hikes/{id}`

Récupère les détails d'une randonnée spécifique.

-   **Path params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | id | integer | Oui |

### Routes protégées

#### Favoris

**PATCH** `randoludique-back.sc1zeep6040.universe.wf/api/hikes/toggle-favorite`

Permet d'ajouter ou retirer une randonnée des favoris.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Query params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | hike_id | integer | Oui |

## Plantes

### Routes publiques

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/plants`

Récupère la liste des plantes.

-   **Body**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | plant_id | integer |
    | plant_common_name | string |
    | plant_scientific_name | string |
    | created_at | date |
    | updated_at | date |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/plants/{id}`

Récupère les détails d'une plante spécifique.

-   **Body**:
    | Key | Value |
    |--------|-------|
    | plant_id | integer |
    | plant_common_name | string |
    | plant_scientific_name | string |
    | created_at | date |
    | updated_at | date |

### Routes protégées

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/plant-discoveries/all`

Récupère la liste totale des découvertes de plantes.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Body**:
    | Key | Value |
    |--------|-------|
    | plant_id | integer |
    | plant_name | string |
    | hike_id | integer |
    | hike_name | string |
    | is_favorite | boolean |
    | discovered_at | datetime |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/plant-discoveries/stats`

Récupère les statistiques totales des découvertes de plantes.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Body**:
    | Key | Value |
    |--------|-------|
    | total_discoverable | integer |
    | total_discovered | integer |
    | discovery_percentage | float |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/plants/discovery-stats/detailed`

Récupère les statistiques détaillées des découvertes de plantes dans chaque randonnée.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Body**:
    | Key | Value |
    |--------|-------|
    | hike_id | integer |
    | hike_name | string |
    | total_plants | integer |
    | discovered_plants | integer |
    | discovery_percentage | float |

**POST** `randoludique-back.sc1zeep6040.universe.wf/api/plants/discover`

Permet de découvrir une plante lors d'une randonnée.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Query params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | plant_id | integer | Oui |
    | hike_id | integer | Oui |

**DELETE** `randoludique-back.sc1zeep6040.universe.wf/api/plants/discover`

Permet de supprimer une découverte de plante.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Query params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | plant_id | integer | Oui |
    | hike_id | integer | Oui |

**PATCH** `randoludique-back.sc1zeep6040.universe.wf/api/plants/discover/favorite`

Permet d'ajouter ou retirer une découverte de plante aux favoris.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Body**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | discovery_id | integer | Oui |
    | is_favorite | boolean | Oui |

## Animaux

### Routes publiques

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/animals`

Récupère la liste des animaux.

-   **Query params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | page | integer | Non |
    | per_page | integer | Non |
    | type | string | Non |
    | search | string | Non |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/animals/{id}`

Récupère les détails d'un animal spécifique.

-   **Path params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | id | integer | Oui |

### Routes protégées

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/animal-discoveries/all`

Récupère la liste totale des découvertes d'animaux.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Body**:
    | Key | Value |
    |--------|-------|
    | animal_id | integer |
    | animal_name | string |
    | hike_id | integer |
    | hike_name | string |
    | is_favorite | boolean |
    | discovered_at | datetime |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/animal-discoveries/stats`

Récupère les statistiques totales des découvertes d'animaux.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Response**:
    | Key | Value |
    |--------|-------|
    | total_discoverable | integer |
    | total_discovered | integer |
    | discovery_percentage | float |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/animal-discoveries/detailed-stats`

Récupère les statistiques détaillées des découvertes d'animaux dans chaque randonnée.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Response**:
    | Key | Value |
    |--------|-------|
    | hike_id | integer |
    | hike_name | string |
    | total_animals | integer |
    | discovered_animals | integer |
    | discovery_percentage | float |

**PATCH** `randoludique-back.sc1zeep6040.universe.wf/api/animals/discover/favorite`

Permet d'ajouter ou retirer une découverte d'animal aux favoris.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Query params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | animal_id | integer | Oui |
    | hike_id | integer | Oui |

## Activités de randonnée

### Routes protégées

**POST** `randoludique-back.sc1zeep6040.universe.wf/api/hiking/start`

Permet de commencer une randonnée.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Query params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | hike_id | integer | Oui |

**POST** `randoludique-back.sc1zeep6040.universe.wf/api/hiking/end`

Permet de terminer une randonnée.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Query params**:
    | Key | Value | Requis |
    |--------|-------|---------|
    | hike_id | integer | Oui |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/hiking/current`

Récupère les informations de la randonnée en cours.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |

**GET** `randoludique-back.sc1zeep6040.universe.wf/api/hiking/stats`

Récupère les statistiques de toutes les randonnées.

-   **Headers**:
    | Key | Value |
    |--------|-------|
    | Authorization | Bearer _votre-token_ |
-   **Body**:
    | Key | Value |
    |--------|-------|
    | total_hikes | integer |
    | completed_hikes | integer |
    | ongoing_hikes | integer |
    | average_duration_minutes | float |

## Codes de réponse

-   `200`: Succès
-   `201`: Création réussie
-   `400`: Erreur de requête
-   `401`: Non authentifié
-   `403`: Non autorisé
-   `404`: Ressource non trouvée
-   `422`: Erreur de validation
-   `500`: Erreur serveur
