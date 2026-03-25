# Projecte Laravel: Gestió de Videojocs i Pel·lícules

**Autor:** Eloi Cortiella / 2n DAM  
**Data:** 2025/2026

---

## Índex
1. [Introducció](#1-introducció)
2. [Fitxers Afegits i Modificats](#2-fitxers-afegits-i-modificats)
    - [Models i Migracions](#models-i-migracions)
    - [Controladors](#controladors)
    - [Vistes (Blade)](#vistes-blade)
3. [Comprovacions del funcionament dels CRUDS](#3-comprovacions-del-funcionament-dels-cruds)
4. [Comprovacions amb Tinker](#4-comprovacions-amb-tinker)

---

## 1. Introducció
Aquest projecte, basat en el patró MVC amb Laravel, permet l'administració (CRUD) completa sobre una biblioteca personal combinada de videojocs i de pel·lícules, tot fent servir disseny adaptatiu i la base de dades relacional d'SQLite de fons. 
Pots trobar més detalls a continuació de tot allò implementat.

---

## 2. Fitxers Afegits i Modificats

A continuació s'explica quins són els fitxers principals modificats en les darreres versions de l'aplicatiu i per què se'ls hi ha fet aquest tractament d'optimització.

### Models i Migracions
- **`database/migrations/xxxx_create_movies_table.php`** i **`app/Models/Movie.php`**  
  **Per què?**: Per solucionar un error on s'estaven enviant o intentant validar camps com _plataforma_ o _descripció_ en les pel·lícules però en un inici varen ser disenyats exclusivament pensats pels videojocs. Les pel·lícules tenen associat un `director` i un `genre` com dicten les seves migracions.

![Migracio Videojocs](resources/img/Migracio1.png)

![Migracio Pelicules](resources/img/Migracio2.png)

### Controladors
- **`app/Http/Controllers/GameController.php`**  
  **Per què?**: S'ha vist la necessitat que un videojoc estigui present a diverses plataformes o consoles diferents alhora. Així que s'ha modificat el validat del controlador perquè el Request rebi la variable de `platform` com un format _Array_ i es transformi en una cadena de text separada per comes (`implode`) abans d'ingerir-se.

![Controlador Videjoc](resources/img/ControladorVideojoc.png)

- **`app/Http/Controllers/MovieController.php`**  
  **Per què?**: Igual que al de GameController, s'ha aplicat el procediment d'implosió al mètode `validated()` preparat en format text array associat a _'genre'_ (ja que una peli pot ser de terror i misteri l'hora, per exemple). S'han corregit les variables a acceptar.

![Controlador Videjoc](resources/img/ControladorPelicula.png)

### Vistes (Blade)
- **`resources/views/layouts/main.blade.php`** i **`resources/views/home.blade.php`**  
  **Per què?**: L'aplicació original resultava poc atractiva visualment i plana. Amb l’ajuda d'etiquetes recents TailwindCSS, s'ha desenvolupat un Header elegant i separat amb una paleta de colors Indi/Blau, un logotip destacat com a `Hero Section` enorme a l'Inici, animacions de relleu i columnes de dades informatives millorant tota l'experiència UI (User Interface).
- **`resources/views/games/_form.blade.php` i `resources/views/movies/_form.blade.php`**  
  **Per què?**: A l'apartat del gènere i les consoles, obligava l’usuari a escriure text net, el que causava errors si un usuari deia "PS5" i altre "PlayStation 5". S'han substituït pels llistats complets en formats quadrícula (checkboxes classificades) ordenant així la lògica visual massiva.

![formulari videojoc](resources/img/Selecció_1529.png)
![formulari pelicula](resources/img/Selecció_1535.png)

- **Plantilles restants dels CRUDS (`index.blade.php`, `create.blade.php`, `edit.blade.php`, `show.blade.php` per a Games i Movies)**  
  **Per què?**: Aquestes plantilles són les encarregades de mostrar cadascuna de les accions del CRUD a l'usuari. S'han mantingut estructurades per heretar el disseny del `main.blade.php` (amb la directiva `@extends('layouts.main')`).  
  - L'`index` presenta les dades en una taula tabular on es mostren ara de format correcte totes les dades i té els botons per saltar ràpidament al Read, Delete i Edit de qualsevol registre.
  - L'arxiu de la vista individual `show` de pel·lícules es va modificar per imprimir `director` i `genre` en comptes dels camps antics.
  - El `create` i l'`edit` simplement reutilitzen via `@include()` el component de formulari parcial (`_form`) per evitar la duplicació de codi i aplicar sempre el disseny de la quadrícula escollit.

### Crear Videjoc
![Crear videojoc](resources/img/Selecció_1530.png)

### Editar Videjoc
![Editar videjoc](resources/img/Selecció_1531.png)

### CRUD Videjoc
![CRUD videjoc](resources/img/Selecció_1532.png)

### Detalls Videjoc
![Detalls videjoc](resources/img/Selecció_1533.png)

### Crear Pelicula
![Crear Pelicula](resources/img/Selecció_1536.png)

### Editar Pelicula
![Editar Pelicula](resources/img/Selecció_1537.png)

### CRUD Pelicula
![CRUD Pelicula](resources/img/Selecció_1538.png)

### Detalls Pelicula
![Detalls Pelicula](resources/img/Selecció_1539.png)


## 3. Comprovacions del funcionament dels CRUDS

**Landing Page**

![Landing Page](resources/img/Selecció_1540.png)

Per demostrar el funcionament cal que provis tu mateix visualment el següent:

**1. Creació (Create):**
Ves a afegir una nova pel·lícula o videojoc. Fixa't com ara els formularis tenen grups de *checkboxes* i permeten marcar mútiples valors, i comença el registre correcte.

![Creació Videjoc UI](resources/img/Selecció_1542.png)
![Creació Peliucla UI](resources/img/Selecció_1548.png)

**2. Visualització (Read/Index):**
Accedeix de nou i fixa't a la taula llistada com el Gènere o la Plataforma s'ha emmagatzemat correctament amb separacions per coma: "Steam, PC" o "Slasher, Terror". Això valida l'`implode()` del Controller. 

### VideoJoc UI
![Index Videjoc UI](resources/img/Selecció_1541.png)
![Detalls Videojoc UI](resources/img/Selecció_1543.png)

### Pelicula UI
![Index Pelicula UI](resources/img/Selecció_1544.png)
![Detalls Pelicula UI](resources/img/Selecció_1545.png)


**3. Modificació (Update/Edit):**
Si ataques la opció _Edit_ del crud en qualsevol element fixat veuràs un detall molt bo: de tota la superllista gran, els elements concrets de les bases de dades es queden activats ja de pas inicial. L'instrucció `in_array(...)` aplicada comprova de forma natural els antics i nous per mantindre’ls.

![Editar Pelicula UI](resources/img/Selecció_1546.png)
![Editar Videjoc UI](resources/img/Selecció_1547.png)
---