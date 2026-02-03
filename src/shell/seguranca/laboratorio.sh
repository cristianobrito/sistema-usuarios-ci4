#!/bin/bash

echo "+++++ LABORATORIO DE TESTES DE SCRIPTS BASH +++++"

echo "digite seu nome:"
read NOME

echo "Bem vindo! $NOME"

DATA=$(date)

PASTA="/var/www/$NOME"
ARQUIVO="$PASTA/cristiano.log"
LOG="/var/www/cristiano/cristiano.log"

if [ -d "$PASTA" ]; then
	echo "pasta do usuario ja existe"
else
	echo "pasta do usuario: $PASTA nao existe. Criando..."
	mkdir $PASTA
	echo "pasta criada com secesso!"
fi

if [ -f "$ARQUIVO" ]; then
	echo "arquivo $ARQUIVO existe"
else 
	echo "arquivo $ARQUIVO nao existe criando..."
	touch $ARQUIVO
	echo "arquivo criado com secesso!"
fi

echo "INICIANDO VARREDURA NA PASTA "
PASTA2="/var/www"

for ITEM in $PASTA2/*
do
	if [ -d "$ITEM" ]; then
		echo "[PASTA2] $ITEM"
	elif [ -f "$ITEM" ]; then
		echo "[ARQUIVO] $ITEM"
	fi
done

echo "==================================================="
echo "Varredura finalizada"

TOTAL_PASTAS=0
TOTAL_ARQUIVOS=0

echo "----- INICIO DA NOVA VARREDURA -----" > $LOG

date >> $LOG

echo "Diretorio analizado: $PASTA2" >> $LOG
echo "----------------------------" >> $LOG

for ITEM in $PASTA2/*
do
	if [ -d "$ITEM" ]; then
		TOTAL_PASTAS=$((TOTAL_PASTAS + 1))
		echo "[PASTA] $ITEM" >> $LOG
	elif [ -f "$ITEM" ]; then
		TOTAL_ARQUIVOS=$((TOTAL_ARQUIVOS + 1))
		echo "[ARQUIVO] $ITEM" >> $LOG
	fi
done

echo "##################################################" >> $LOG
echo "total de pastas: $TOTAL_PASTAS" >> $LOG
echo "total de arquivos: $TOTAL_ARQUIVOS" >> $LOG
echo "===== FIM DA VARREDURA =====" >> $LOG 

echo "varredura concluida veja o log em $LOG"

echo "***************************************************"
ls -l 

echo "---------------------------------------------------"
echo "$DATA"
