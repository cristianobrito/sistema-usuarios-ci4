#!/bin/bash
echo "---------------------------------"
echo "setimo script de sabado verificar ambiente"
DATA=$(date)

PASTA="/var/www/shell/protecao"
BASE="/var/www/shell/protecao/protect"
ATUAL="$BASE/estado_atual.txt"
ANTERIOR="$BASE/estado_anterior.txt"

echo "===== [ monitorando alteracoes ] ====="
echo "$DATA"

ls -lR $PASTA > $ATUAL

if [ ! -f "$ANTERIOR" ]; then
	echo "primeira execucao. criando a baseline..."
	cp $ATUAL $ANTERIOR
	exit 0
fi

echo "comparando estados..."

diff $ANTERIOR $ATUAL

cp $ATUAL $ANTERIOR

echo "===== [ fim do monitoramento ] ====="
