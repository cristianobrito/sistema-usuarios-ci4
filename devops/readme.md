
---
author: *Cristiano*

title: *CI4*

ano: *2026*


---
# CI4

### Iniciando o docker
- docker desktop rodando

```bash

O Windows PowerShell
Copyright (C) Microsoft Corporation. Todos os direitos reservados.

Instale o PowerShell mais recente para obter novos recursos e aprimoramentos! https://aka.ms/PSWindows

PS C:\Users\brito> wsl --list --verbose
  NAME              STATE           VERSION
* Ubuntu-24.04      Running         2
  docker-desktop    Running         2
  kali-linux        Stopped         2
PS C:\Users\brito> wsl -d ubuntu-24.04
cristiano@Akilles:/mnt/c/Users/brito$ cd desktop
cristiano@Akilles:/mnt/c/Users/brito/desktop$ ls
'Blender 4.5.lnk'    Discord.lnk          'Navegador Opera GX.lnk'  'Roblox Studio.lnk'       estudo-versao        phpBackEnd
'Clash Royale.lnk'  'Docker Desktop.lnk'   Postman.lnk               UCLivre                 'nano - Chrome.lnk'   saloon
 CodeBlocks.lnk     'Dying Light.url'      Projetos                  Valheim.url              nanoBanana
 Cuphead.url        'Meus projetos'       'Resident Evil 6.url'      ballroom@email.com.txt   pddesafio
'Dead Cells.url'     NANO                 'Roblox Player.lnk'        desktop.ini              php-teste
cristiano@Akilles:/mnt/c/Users/brito/desktop$ cd Projetos/
cristiano@Akilles:/mnt/c/Users/brito/desktop/Projetos$ ls
sistema-usuarios-ci4
cristiano@Akilles:/mnt/c/Users/brito/desktop/Projetos$ cd sistema-usuarios-ci4/
cristiano@Akilles:/mnt/c/Users/brito/desktop/Projetos/sistema-usuarios-ci4$ ls
docker  docker-compose.yml  src  teste.txt
cristiano@Akilles:/mnt/c/Users/brito/desktop/Projetos/sistema-usuarios-ci4$ code .
cristiano@Akilles:/mnt/c/Users/brito/desktop/Projetos/sistema-usuarios-ci4$ docker compose up -d
[+] up 9/9
 ✔ Image httpd:2.4 Pulled                                                                                                                 12.7s
[+] Building 169.4s (14/14) FINISHED
 => [internal] load local bake definitions                                                                                                 0.0s
 => => reading from stdin 591B                                                                                                             0.0s
 => [internal] load build definition from Dockerfile                                                                                       0.1s
 => => transferring dockerfile: 396B                                                                                                       0.1s
 => [internal] load metadata for docker.io/library/composer:2                                                                              2.1s
 => [internal] load metadata for docker.io/library/php:8.3-fpm                                                                             2.1s
 => [auth] library/composer:pull token for registry-1.docker.io                                                                            0.0s
 => [auth] library/php:pull token for registry-1.docker.io                                                                                 0.0s
 => [internal] load .dockerignore                                                                                                          0.1s
 => => transferring context: 2B                                                                                                            0.0s
 => FROM docker.io/library/composer:2@sha256:f0809732b2188154b3faa8e44ab900595acb0b09cd0aa6c34e798efe4ebc9021                             29.3s
 => => resolve docker.io/library/composer:2@sha256:f0809732b2188154b3faa8e44ab900595acb0b09cd0aa6c34e798efe4ebc9021                        0.1s
 => => sha256:6ee3c1d2e9ac7a655644d16c8738bccf2f888f42697c20b3744bc484ea326bae 421B / 421B                                                 0.4s
 => => sha256:85e723217902d16913eb5cd85e16f0238e8144013064dd023973e7d839d6da8d 1.20MB / 1.20MB                                             1.1s
 => => sha256:14a3951ce7cc33af36e7896f9a99572ad29daa2d0e6cd866dc6b6966009b3eab 93B / 93B                                                   0.3s
 => => sha256:7feec308fd3470c97255d7a60020bbe90d767c5479a73814bc55c513ff36ebe3 257B / 257B                                                 0.4s
 => => sha256:fef3c71157308e87aeaddd091a8894ec070a66f8d6ed72cdf7742aee2c2861b0 32.83MB / 32.83MB                                          14.9s
 => => sha256:5ae2e9d59d676a12ce9da665afe56a91b2a27e62233ba66323fec94c0f49338b 23.48kB / 23.48kB                                           0.5s
 => => sha256:f6293f18632475b1ea319995f8245c05e8d802857bd2a39a98fed016f91106fd 2.45kB / 2.45kB                                             0.6s
 => => sha256:8f866b47475493bf21ad3e1b32580ab533f4457757c520505e73c47c5f3d9e72 489B / 489B                                                 0.4s
 => => sha256:251241f73b97776db2de604e4979799f3d1c2c1c2e3a5fb11d7c1b7b57c96448 22.50MB / 22.50MB                                          17.3s
 => => sha256:5b96c519b27935166d288d512d749c5bf07e4c4fbc7fc63010df76398259215c 14.36MB / 14.36MB                                           8.9s
 => => sha256:06c017f27ba6678a1cfeaadf4eaf1b18a51a1460806ce9f3ff76c8554c4e195b 217B / 217B                                                 0.4s
 => => sha256:93ab0a7227406b79dfd1360d92ad1e273e67dcad75ad13739a2499abe6b39abb 3.59MB / 3.59MB                                             2.1s
 => => sha256:05985ee3d59f78930e4b88f3809a4fbdc28c431289fccbfe5faa90e00bdf7f67 932B / 932B                                                 0.4s
 => => extracting sha256:93ab0a7227406b79dfd1360d92ad1e273e67dcad75ad13739a2499abe6b39abb                                                  0.1s
 => => extracting sha256:05985ee3d59f78930e4b88f3809a4fbdc28c431289fccbfe5faa90e00bdf7f67                                                  0.0s
 => => extracting sha256:06c017f27ba6678a1cfeaadf4eaf1b18a51a1460806ce9f3ff76c8554c4e195b                                                  0.0s
 => => extracting sha256:5b96c519b27935166d288d512d749c5bf07e4c4fbc7fc63010df76398259215c                                                  0.1s
 => => extracting sha256:8f866b47475493bf21ad3e1b32580ab533f4457757c520505e73c47c5f3d9e72                                                  0.0s
 => => extracting sha256:251241f73b97776db2de604e4979799f3d1c2c1c2e3a5fb11d7c1b7b57c96448                                                  0.9s
 => => extracting sha256:f6293f18632475b1ea319995f8245c05e8d802857bd2a39a98fed016f91106fd                                                  0.1s
 => => extracting sha256:5ae2e9d59d676a12ce9da665afe56a91b2a27e62233ba66323fec94c0f49338b                                                  0.0s
 => => extracting sha256:fef3c71157308e87aeaddd091a8894ec070a66f8d6ed72cdf7742aee2c2861b0                                                  2.7s
 => => extracting sha256:7feec308fd3470c97255d7a60020bbe90d767c5479a73814bc55c513ff36ebe3                                                  0.1s
 => => extracting sha256:85e723217902d16913eb5cd85e16f0238e8144013064dd023973e7d839d6da8d                                                  0.1s
 => => extracting sha256:6ee3c1d2e9ac7a655644d16c8738bccf2f888f42697c20b3744bc484ea326bae                                                  0.0s
 => => extracting sha256:14a3951ce7cc33af36e7896f9a99572ad29daa2d0e6cd866dc6b6966009b3eab                                                  0.0s
 => [stage-0 1/4] FROM docker.io/library/php:8.3-fpm@sha256:6754d4da4545f912c55671e4dd2eb79ea4d1ed677b93e1c5415fe46d1a46b23d              40.9s
 => => resolve docker.io/library/php:8.3-fpm@sha256:6754d4da4545f912c55671e4dd2eb79ea4d1ed677b93e1c5415fe46d1a46b23d                       0.1s
 => => sha256:3fa9c33bd993ff39e5740b000665bddb134085a63b7fed5a943bf8c3e951ae65 252B / 252B                                                 0.4s
 => => sha256:912c013cbaf68907625df3f0be14d3f7032f0740d78acd6301a7bd8906625799 490B / 490B                                                 0.6s
 => => sha256:7821320bce4903568098c97ce8163762b04ac29c134dabf73c5c2ca3090c9685 9.26kB / 9.26kB                                             2.2s
 => => sha256:be252c4bd7319726a1203dc4db70ad441156c36c88b73a241f130b9b1533fe54 11.90MB / 11.90MB                                           5.4s
 => => sha256:e032f3fba1f3775545f4d27c2f5f1a42804e4c2afc3ee94fbeab36e690475ee0 12.76MB / 12.76MB                                           9.8s
 => => sha256:73fea85b467e116a4326a0416afc556c654d66b8b60f70f6ec36a47b69429659 2.46kB / 2.46kB                                             1.2s
 => => sha256:22fdd6bd1ca27396a236e44a64faad010da5836261a88b6e842f724128712aa1 248B / 248B                                                 0.4s
 => => sha256:503bfb9439eb5a588e17ab7dc663eb3b8f1942f089f13dffcb2a7c219b9ca5ec 225B / 225B                                                 0.6s
 => => sha256:88148e379d0b64b4db3be2aa1c3147aa68c53e1b945dd807bf9c2e9e8408ef06 117.84MB / 117.84MB                                        32.4s
 => => sha256:a42d06368753fdcc99a0b9f38420309b4d394b4a2a49f96360de145195a62918 225B / 225B                                                 0.4s
 => => extracting sha256:a42d06368753fdcc99a0b9f38420309b4d394b4a2a49f96360de145195a62918                                                  0.0s
 => => extracting sha256:88148e379d0b64b4db3be2aa1c3147aa68c53e1b945dd807bf9c2e9e8408ef06                                                  3.0s
 => => extracting sha256:503bfb9439eb5a588e17ab7dc663eb3b8f1942f089f13dffcb2a7c219b9ca5ec                                                  0.3s
 => => extracting sha256:e032f3fba1f3775545f4d27c2f5f1a42804e4c2afc3ee94fbeab36e690475ee0                                                  0.1s
 => => extracting sha256:912c013cbaf68907625df3f0be14d3f7032f0740d78acd6301a7bd8906625799                                                  0.1s
 => => extracting sha256:be252c4bd7319726a1203dc4db70ad441156c36c88b73a241f130b9b1533fe54                                                  1.2s
 => => extracting sha256:73fea85b467e116a4326a0416afc556c654d66b8b60f70f6ec36a47b69429659                                                  0.1s
 => => extracting sha256:3fa9c33bd993ff39e5740b000665bddb134085a63b7fed5a943bf8c3e951ae65                                                  0.0s
 => => extracting sha256:22fdd6bd1ca27396a236e44a64faad010da5836261a88b6e842f724128712aa1                                                  0.0s
 => => extracting sha256:4f4fb700ef54461cfa02571ae0db9a0dc1e0cdb5577484a6d75e68dc38e8acc1                                                  0.0s
 => => extracting sha256:7821320bce4903568098c97ce8163762b04ac29c134dabf73c5c2ca3090c9685                                                  0.0s
 => [stage-0 2/4] RUN apt-get update && apt-get install -y     git     unzip     libicu-dev     libzip-dev     libonig-dev     && docke  115.9s
 => [stage-0 3/4] COPY --from=composer:2 /usr/bin/composer /usr/bin/composer                                                               0.3s
 => [stage-0 4/4] WORKDIR /var/www                                                                                                         0.3s
 => exporting to image                                                                                                                     8.2s
 => => exporting layers                                                                                                                    7.0s
 => => exporting manifest sha256:7d78c5cadf9b1afe686eb3257d662f2aeafb666be9a2f235f145780c368b73a3                                          0.0s
 => => exporting config sha256:6e00eee3a4c2cfd2f602ffd204f6f9dee920783017b1f0209e42a9ad8c37965e                                            0.0s
 => => exporting attestation manifest sha256:7fdee81ec62d3f16322f62daeffe6ed9366e39134696cd30d379fb1fe08e038a                              0.1s
 => => exporting manifest list sha256:2807f9d27a221124db2482af7fac2e459965599cb385e05c26840959c4496d12                                     0.0s
 => => naming to docker.io/library/sistema-usuarios-ci4-app:latest                                                                         0.0s
[+] up 13/13king to docker.io/library/sistema-usuarios-ci4-app:latest                                                                      1.0s
 ✔ Image httpd:2.4                Pulled                                                                                                  12.7s
 ✔ Image sistema-usuarios-ci4-app Built                                                                                                  169.2s
 ✔ Network sistema-usuarios-ci4_ci4 Created                                                                                                0.1s
 ✔ Container ci4_app              Created                                                                                                  1.9s
 ✔ Container ci4_web              Created                                                                                                  0.3s
cristiano@Akilles:/mnt/c/Users/brito/desktop/Projetos/sistema-usuarios-ci4$ docker ps
CONTAINER ID   IMAGE                      COMMAND                  CREATED         STATUS         PORTS                                     NAMES
264c5f74c7ad   httpd:2.4                  "sh -c ' sed -i 's/#…"   7 seconds ago   Up 5 seconds   0.0.0.0:8080->80/tcp, [::]:8080->80/tcp   ci4_web
802ef2ab9556   sistema-usuarios-ci4-app   "docker-php-entrypoi…"   8 seconds ago   Up 6 seconds   9000/tcp                                  ci4_app
cristiano@Akilles:/mnt/c/Users/brito/desktop/Projetos/sistema-usuarios-ci4$

```

---
### Indo nas urls para conferir se tudo esta correto
- acessar as rotas
- http://localhost:8080/ 
- http://localhost:8080/dashboard/nano
- http://localhost:8080/register
- http://localhost:8080/teste2/ana
- http://localhost:8080/teste/ana
- http://localhost:8080/login
- http://localhost:8080/users/3


*A algumas rotas ativas no momento todas funcionando*

---
## Criação de rotas controllers e metodos
- como criar uma rota?
    
    - src/app/Config/Routes.php

```php
$routes->get('/nova', 'NovaController::nova');
```


- como criar um controlador?
    
    - src/app/Controllers

    - src/app/Controllers/NovaController.php 

        - *criamos uma arquivo com a extensão `.php`*  
        - *controlador deve ter o mesmo nome da classe*
        - *Letra inicial `Maiuscula`*
        - *Chamamos na url pelo metodo `nova`*
        - *deve extender `class NovaController extends BaseController`*
        - **CODE abaixo:**
```php
<?php

namespace App\Controllers;

class NovaController extends BaseController
{
    public function nova(): string
    {
        return '<h2>ola rota Nova<h2>';
    }
}
```
- Ir na url:
    - http://localhost:8080/`nova`
    - `[nota]:` Na url usar o nome da função/metodo `nova()`

- Como retornar uma view()
    - return view('`home`');
    - *colocamos o nome da viu ou o caminho dentro da função*
    - ir na url: http://localhost:8080/`nova`
    - a view é um arquivo html normal salvo como .php

```php
<?php

namespace App\Controllers;

class NovaController extends BaseController
{
    public function nova(): string
    {
        return view('home');
    }
}
```
## Closures
- o que é uma closure?
    - é uma função anonima sem nome
```php
function() {
    return 'Olá';
}
```
- onde uso:
```php
$routes->get('/health', function(){
    return 'API ok! - codeigniter esta vivo! ola mundo!';
});
```
### fluxo:
- URL → Routes.php → Controller → View

---
### pegar os dados na view
- esc() é segurança → protege contra XSS
```php
<p><?php echo $nome ?></p>
<p><?= esc($nome) ?></p>
<p><?= $nome ?></p>
```
---




