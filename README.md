**Application Web de gestion d'une discothèque**  

**Technos :**  
PHP / Symfony  
MySql / Doctrine  
API Platform  
Bootstrap  

Authentification  
CRUD disques  
CRUD users  

**Droits :**  
Anonyme : login, création d'un accès  
User : anonyme + liste des disques  
Admin : user + liste des users, edition d'un user, suppression d'un user, modification d'un user, ajout d'un disque, edition d'un disque, modification d'un disque, suppression d'un disque  

**API**  
Limitée à GET pour obtenir la liste des disques ou le détail d'un disque.  
L'ID n'est pas exposé.  
