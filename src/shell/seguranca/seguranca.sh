#!/bin/bash

echo "===== ARQUIVO DE SEGURANCA ====="

echo "Insira seu nome"
read NOME

echo "vamos iniciar $NOME"

PASTA="/var/www/logs"
ARQUIVO="$PASTA/appCI4.log"

if [ -d "$PASTA" ]; then
	echo "pasta $PASTA ja existe"
else 
	echo "pasta nao existe criando. . ."
	mkdir $PASTA
fi

if [ -f "$ARQUIVO" ]; then
	echo "arquivo ja existe"
else 
	echo "arquivo nao existe criando. . ."
	touch $ARQUIVO
fi

echo "----- status final -----"
ls -l $PASTA
  

DATA=$(date)



echo "$DATA"
