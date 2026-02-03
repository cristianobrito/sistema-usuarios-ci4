#!/bin/bash

PASTA="/var/www"
LOG="/var/www/logs/scan.log"

TOTAL_PASTAS=0
TOTAL_ARQUIVOS=0

echo "=== INICIO DA VARREDURA ===" > $LOG
date >> $LOG
echo "Diretorio analisado: $PASTA" >> $LOG
echo "---------------------------" >> $LOG

for ITEM in $PASTA/*
do
    if [ -d "$ITEM" ]; then
        TOTAL_PASTAS=$((TOTAL_PASTAS + 1))
        echo "[PASTA]  $ITEM" >> $LOG
    elif [ -f "$ITEM" ]; then
        TOTAL_ARQUIVOS=$((TOTAL_ARQUIVOS + 1))
        echo "[ARQUIVO] $ITEM" >> $LOG
    fi
done

echo "---------------------------" >> $LOG
echo "Total de pastas: $TOTAL_PASTAS" >> $LOG
echo "Total de arquivos: $TOTAL_ARQUIVOS" >> $LOG
echo "=== FIM DA VARREDURA ===" >> $LOG

echo "Varredura concluida. Veja o log em $LOG"

