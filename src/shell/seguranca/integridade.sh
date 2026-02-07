#!/bin/bash

echo " teste de script 7 "
PASTA="/var/www/shell"
BASE="/var/www/shell/seguranca/"

ATUAL="$BASE/hashes_atual.txt"
ANTERIOR="$BASE/hashes_anterior.txt"

echo "================================="
echo "VERIFICACAO DE INTEGRIDADE"
echo "================================="

find $PASTA -type f -exec sha256sum {} \; > $ATUAL

# primeira execucao
if [ ! -f "$ANTERIOR" ]; then
	echo "primeira execucao - criando baseline hashes..."
	cp $ATUAL $ANTERIOR
	exit 0
fi

echo "comparando integridade"
diff $ANTERIOR $ATUAL

# atualiza a baseline
cp $ATUAL $ANTERIOR

echo "===== FIM ====="
date
