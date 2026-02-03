#!/bin/bash

echo "===== aula6 ====="

PASTA="/var/www"
LOG="/var/www/shell/logs/scan_extesoes.log"

PHP_COUNT=0
LOG_COUNT=0
OUTROS_COUNT=0

echo "----- scan de extensoes -----" > $LOG
date >> $LOG

echo "diretorio analizado: $PASTA" >> $LOG
echo "---------------------------" >> $LOG

for ITEM in $(find "$PASTA" -maxdepth 2 -not -path '*/.*' -type f)
do
	if [ -f "$ITEM" ]; then

		case "$ITEM" in
			*.php)
				PHP_COUNT=$((PHP_COUNT + 1))
				echo "[PHP] $ITEM" >> $LOG
				;;
			*.log)
				LOG_COUNT=$((LOG_COUNT + 1))
				echo "[LOG] $ITEM" >> $LOG
				;;
			*)
				OUTROS_COUNT=$((OUTROS_COUNT + 1))
				echo "[OUTROS] $ITEM" >> $LOG
				;;
		esac

	fi
done

echo "++++++++++++++++++++++++++++++++++" >> $LOG
echo "total PHP: $PHP_COUNT" >> $LOG
echo "total LOG: $LOG_COUNT" >> $LOG
echo "OUTROS arquivos: $OUTROS_COUNT" >> $LOG
echo "===== FIM DO SCAN =====" >> $LOG

echo "scan finalizado. log em $LOG"

pwd
