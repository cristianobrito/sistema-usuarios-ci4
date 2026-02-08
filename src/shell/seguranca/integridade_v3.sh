#!/bin/bash

PASTA="/var/www/shell"
BASE="/var/www/shell/seguranca"

ATUAL="$BASE/hashes_atual.txt"
ANTERIOR="$BASE/hashes_anterior.txt"
LOG="$BASE/seg_v2.log"

cabecalho() {
	echo "======================"
	echo "Analise de integridade"
	date 
	echo "======================"
}

gerar_hashes() {
	find "$PASTA" -type f -exec sha256sum {} \; > "$ATUAL"
}

primeira_execucao() {
	if [ ! -f "$ANTERIOR" ]; then
		echo "primeira execucao - criando baseline"
		cp "$ATUAL" "$ANTERIOR"
		exit 0
	fi
}

classificar_eventos() {
	diff "$ANTERIOR" "$ATUAL" | while read -r linha
    do
	  case "$linha" in
		\<*)
			echo "[REMOVIDO] ${linha#< }" | tee -a "$LOG"
			;;
		\>*)
			echo "[NOVO/ALTERADO] ${linha#> }" | tee -a "$LOG"
			;;
	  esac
    done
}

atualizar_baseline() {
	cp "$ATUAL" "$ANTERIOR"
}

# ===== EXECUCAO =====
cabecalho
gerar_hashes
primeira_execucao
classificar_eventos
atualizar_baseline

echo "===== FIM ====="
echo ""
