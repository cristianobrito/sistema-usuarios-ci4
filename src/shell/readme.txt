RESUMO RAPIDO:
______________________________________________________________________________________________________________________
                        COLOCAR COR NA SAIDA DOS COMANDOS DO DIFF NO TERMINAL DO LINUX

- Como colocar cor no diff (recomendado)
  Existem 3 formas práticas de colorir a saída do diff, da mais simples à mais bonita:
  1. Forma mais fácil e nativa (GNU diff moderno)
       Muitos sistemas atuais já suportam --color:
         diff --color=always "$ANTERIOR" "$ATUAL"
       Ou (melhor ainda — só colore quando saída é terminal):
         diff --color=auto "$ANTERIOR" "$ATUAL"

   Modifique a função comparar() assim:
   comparar() {
     echo -e "${YELLOW}Comparando integridade...${NC}"
     diff --color=auto "$ANTERIOR" "$ATUAL" || true
     # o || true evita que o script saia com erro quando houver diferenças
   }

- Se o seu container for muito antigo/minimalista e o diff não suportar --color, vai dar erro → use as opções abaixo.

  2. Usar colordiff (muito bonito e recomendado)
     Instale (se for Debian/Ubuntu baseado):
       apt update && apt install -y colordiff
     Ou Alpine:
       apk add colordiff

_____________________________________________________________________________________________________________________
                        ALINAHDNO A SAIDA DO TERMINAL

- modificamos a função classificar_eventos() assim:

classificar_eventos() {
	diff "$ANTERIOR" "$ATUAL" | while read -r linha
    do
	  case "$linha" in
		\<*)
		    # printf para ver a saida alinhada
		    printf "%-15s %s\n" "[REMOVIDO]" "${linha#< }" | tee -a "$LOG"        
			;;
		\>*)
		    # printf para ver a saida alinhada
		    printf "%-15s %s\n" "[NOVO/ALTERADO]" "${linha#> }" | tee -a "$LOG"
			;;
	  esac
    done
}

______________________________________________________________________________________________________________________
                        COLOCAR COR NA SAIDA DOS COMANDOS DO TERMINAL
- configuramos as variaveis
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

- usamos assim
echo -e "${RED}teste de permissao${NC}"
echo -e "${GREEN}teste de permissao${NC}"
echo -e "${YELLOW}teste de permissao${NC}"
echo -e "${BLUE}teste de permissao${NC}"

______________________________________________________________________________________________________________________
                        modificando a função para ter um alinhamento profissional
- modificamos a função classificar_eventos() disso:

classificar_eventos() {
    diff "$ANTERIOR" "$ATUAL" | while read linha
    do
        case "$linha" in
            \<*)
                log_evento "ALERT" "REMOVIDO" "${linha#< }"
                ;;
            \>*)
                log_evento "INFO" "NOVO/ALTERADO" "${linha#> }"
                ;;
        esac
    done
}

- para isso:

classificar_eventos() {
    diff "$ANTERIOR" "$ATUAL" | while read linha
    do
        case "$linha" in
            \<*)
                ARQUIVO=$(echo "${linha#< }" | awk '{print $2}')
                log_evento "ALERT" "REMOVIDO" "$ARQUIVO"
                ;;
            \>*)
                ARQUIVO=$(echo "${linha#> }" | awk '{print $2}')
                log_evento "INFO" "NOVO/ALTERADO" "$ARQUIVO"
                ;;
        esac
    done
}


______________________________________________________________________________________________________________________
                        modificando a função log_evento para ter um alinhamento profissional

log_evento() {
    NIVEL="$1"
    TIPO="$2"
    ARQUIVO="$3"
    # echo "$(timestamp) | $NIVEL | $TIPO | $ARQUIVO" | tee -a "$LOG"

    printf "%-19s | %-6s | %-13s | %s\n" \
        "$(timestamp)" \
        "$NIVEL" \
        "$TIPO" \
        "$ARQUIVO" | tee -a "$LOG"
}

saida:
root@12b246af87d7:/var/www/shell/seguranca# ./integridade_v4.sh
==============================
MONITOR DE INTEGRIDADE
==============================
2026-02-08 14:43:05 | ALERT  | REMOVIDO      | /var/www/shell/seguranca/hashes_anterior.txt
2026-02-08 14:43:05 | ALERT  | REMOVIDO      | /var/www/shell/seguranca/hashes_atual.txt
2026-02-08 14:43:05 | INFO   | NOVO/ALTERADO | /var/www/shell/seguranca/hashes_anterior.txt
2026-02-08 14:43:05 | INFO   | NOVO/ALTERADO | /var/www/shell/seguranca/hashes_atual.txt
2026-02-08 14:43:05 | ALERT  | REMOVIDO      | /var/www/shell/seguranca/integridade_v4.sh
2026-02-08 14:43:05 | INFO   | NOVO/ALTERADO | /var/www/shell/seguranca/integridade_v4.sh
2026-02-08 14:43:05 | ALERT  | REMOVIDO      | /var/www/shell/seguranca/seg_v4.log
2026-02-08 14:43:05 | INFO   | NOVO/ALTERADO | /var/www/shell/seguranca/seg_v4.log
===== FIM =====

- totalmente alinhada como queremos

______________________________________________________________________________________________________________________
                        CRON 

Passo 1: Identifique a distribuição base do container
Rode isso dentro do container para saber qual gerenciador de pacotes usar:
  cat /etc/os-release Ou head -n 5 /etc/os-release

Se aparecer Alpine → use apk
Se aparecer Debian ou Ubuntu → use apt
Outras (CentOS/Rocky) → yum ou dnf (raro em containers leves)

Passo 2: Instale o cron (dentro do container)
Se for Alpine Linux (o mais comum em containers leves que dão esse erro):
  apk update
  apk add --no-cache busybox-cron   # ou só 'apk add cron' em algumas versões
Depois teste:
crontab -l ou crond -V   # para ver se o daemon está disponível
Se for Debian / Ubuntu:
  apt update
  apt install -y cron
Depois:
  crontab -l
service cron status   # ou /etc/init.d/cron status
Passo 3: Após instalar, configure seu crontab
  crontab -e
Isso abre o editor (provavelmente vi ou nano). Adicione sua linha, ex:
  */5 * * * * /var/www/shell/seguranca/integridade_v4.sh >> /var/www/shell/seguranca/cron.log 2>&1
Salve e saia.

Para testar se o cron está rodando:
Inicie manualmente o daemon (em foreground para teste):
Alpine: crond -f -l 8
Debian/Ubuntu: cron -f -L 15


Ou rode o script manualmente algumas vezes para ver se o log cresce.


______________________________________________________________________________________________________________________
                        ONDE FUI 
PS C:\Users\brito> docker exec -it ci4_app bash
root@12b246af87d7:/var/www# ls
LICENSE    app     composer.json  cristiano  logs              preload.php  shell  tests   writable
README.md  builds  composer.lock  env        phpunit.xml.dist  public       spark  vendor
root@12b246af87d7:/var/www# cd shell
root@12b246af87d7:/var/www/shell# ls
logs  protecao  readme.txt  seguranca  seguranca2
root@12b246af87d7:/var/www/shell# cd seguranca
root@12b246af87d7:/var/www/shell/seguranca# ls
dois.txt     domingo3.sh          integridade.sh          integridade_v3.sh  novo2.txt  oito.txt    seg_v4.log     seguranca3.sh       um.txt
domingo.sh   hashes_anterior.txt  integridadeRefactor.sh  integridade_v4.sh  novo7.txt  seg6.sh     seguranca.sh   seis.txt
domingo2.sh  hashes_atual.txt     integridade_v2.sh       laboratorio.sh     novo8.txt  seg_v2.log  seguranca2.sh  testes_domingo.txt
root@12b246af87d7:/var/www/shell/seguranca# /usr/sbin/cron -f -L 15
^C
root@12b246af87d7:/var/www/shell/seguranca# /usr/sbin/cron &
[1] 3556
root@12b246af87d7:/var/www/shell/seguranca# ps aux | grep cron
bash: ps: command not found
[1]+  Done                    /usr/sbin/cron
root@12b246af87d7:/var/www/shell/seguranca# /usr/sbin/cron &
[1] 3635
root@12b246af87d7:/var/www/shell/seguranca# cron: can't lock /var/run/crond.pid, otherpid may be 3557: Resource temporarily unavailable
^C
[1]+  Exit 1                  /usr/sbin/cron
root@12b246af87d7:/var/www/shell/seguranca# /usr/sbin/cron &
[1] 3636
root@12b246af87d7:/var/www/shell/seguranca# cron: can't lock /var/run/crond.pid, otherpid may be 3557: Resource temporarily unavailable
^C
[1]+  Exit 1                  /usr/sbin/cron
root@12b246af87d7:/var/www/shell/seguranca# /usr/sbin/cron -f -L 15
cron: can't lock /var/run/crond.pid, otherpid may be 3557: Resource temporarily unavailable
root@12b246af87d7:/var/www/shell/seguranca#

______________________________________________________________________________________________________________________
                        COMO PARAR O CRON
cron é automacao
ainda nao sei usar ao certo

seg_v4.log 199
2026-02-08 15:34:07 | INFO   | NOVO/ALTERADO | /var/www/shell/seguranca/seg_v4.log

2️⃣ “como parar agora?”
🔴 Parar o cron (IMEDIATO)
crontab -e


Comente ou apague a linha do seu script:

# * * * * * /var/www/shell/seguranca/integridade_v4.sh

Salvar e sair.

👉 acabou. Nada mais roda.

Conferir:
crontab -l


Se a linha não estiver ativa → cron parado.



______________________________________________________________________________________________________________________
                        MODIFICANDO A FUNCAO GERAR_HASHES
- ANTES:
gerar_hashes() {
    find "$PASTA" -type f -exec sha256sum {} \; > "$ATUAL"
}

- DEPOIS:
gerar_hashes() {
    find "$PASTA" \
        ! -name "seg_v4.log" \
        ! -name "cron.log" \
        ! -name "cron-integridade.log" \
        ! -name "hashes_*" \
        -type f -exec sha256sum {} \; > "$ATUAL"
}

- NOVA MODIFICAÇÃO:
gerar_hashes() {
    find "$PASTA" -type f \
        ! -name "seg_v4.log" \
        ! -name "cron.log" \
        ! -name "hashes_atual.txt" \
        ! -name "hashes_anterior.txt" \
        -exec sha256sum {} \; > "$ATUAL"
}


______________________________________________________________________________________________________________________
                        MODIFICANDO A FUNCAO GERAR_HASHES

estudar mais cron
