#!/bin/bash
##################################
# script que percorre uma pasta
# analiza arquivos
# mostra informacoes
##################################
VERDE='\033[0;32m'
AMARELO='\033[1;33m'
RESET='\033[0m'
echo '----- [ varredura de arquivos ] -----'
PASTA='/var/www/shell'

for ITEM in $PASTA/*
do
	if [ -d "$ITEM" ]; then
		echo -e "${VERDE}[PASTA  ]${RESET}\t $ITEM"
	elif [ -f "$ITEM" ]; then
		echo -e "${AMARELO}[ARQUIVO]${RESET}\t $ITEM"
	fi
done
date
echo '----- [ FIM DO SCRIPT ] -----'
