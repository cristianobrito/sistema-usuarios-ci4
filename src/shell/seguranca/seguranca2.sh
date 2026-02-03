#!/bin/bash

echo "----- Varredura de arquivos -----"

PASTA="/var/www"

for ITEM in $PASTA/*
do
	if [ -d "$ITEM" ]; then
		echo "[PASTA] $ITEM"
	elif [ -f "$ITEM" ]; then
		echo "[ARQUIVO] $ITEM"
	fi
done

DATA=$(date)

echo "+++++ varredura finalizada +++++"

echo "$DATA"
