#!/bin/bash
###############################################
#
#
#	SCRIPT DE REFATORAMENTO integridade_v2.sh
#
#
###############################################


PASTA="/var/www/shell"
BASE="/var/www/shell/seguranca"

ATUAL="$BASE/hashes_atual.txt"
ANTERIOR="$BASE/hashes_anterior.txt"

cabecalho() {
	echo "========================="
	echo "VERIFICACAO DE INTEGRIDADE"
	date
	echo "========================="

}

gerar_hashes() {
	find "$PASTA" -type f -exec sha256sum {} \; > "$ATUAL"
}

primeira_execucao() {
	if [ ! -f "$ANTERIOR" ]; then
		echo "primeira execucao - criando a baseline"
		cp "$ATUAL" "$ANTERIOR"
		exit 0
	fi

}

# diff --color=auto "$ANTERIOR" "$ATUAL"  so colore quando a saida e no terminal
comparar() {
	echo "comparando integridade"
	diff --color=always "$ANTERIOR" "$ATUAL" || true
}

atualizar_baseline() {
	cp "$ATUAL" "$ANTERIOR"
}

# ====== execucao ======
cabecalho
gerar_hashes
primeira_execucao
comparar
atualizar_baseline

echo "===== [ FIM ] ====="

