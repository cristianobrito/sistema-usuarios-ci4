#!/bin/bash
##############################################
# esse escript verifica se uma pasta existe
# cria a pasta se ela nao existir
# verifica se um arquivo existe
# mostra mensagens claras de status
##############################################
echo "=====[ INICIO DO SCRIPT ]====="

#############################################
VERDE='\033[0;32m'
AMARELO='\033[1;33m'
VERMELHO='\033[0;31m'
AZUL='\033[0;34m'
AZUL_CLARO='\033[1;34'
RESET='\033[0m'
#############################################

PASTA="/var/www/shell/logs"
ARQUI="$PASTA/verificaPastaArquivo.log"

if [ -d "$PASTA" ]; then
	echo -e "pasta${VERDE}\t[ $PASTA ]\t\t\t\t\t${RESET}ja existe."
else
	echo "pasta nao existe criando. . ."
	mkdir $PASTA
fi

if [ -f "$ARQUI" ]; then
	echo -e "arquivo${AZUL}\t[ $ARQUI ]\t${RESET}ja existe."
else
	echo "arquivo nao existe criando..."
	touch $ARQUI
fi

echo "status final"
ls -l $PASTA
echo "=====[ FIM ]====="
