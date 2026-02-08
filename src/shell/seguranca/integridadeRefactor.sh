#!/bin/bash
###############################################
#
#
#	SCRIPT DE REFATORAMENTO
#
#
###############################################

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

# testando as cores 
echo -e "${RED}teste de permissao${NC}"
echo -e "${GREEN}teste de permissao${NC}"
echo -e "${YELLOW}teste de permissao${NC}"
echo -e "${BLUE}teste de permissao${NC}"

PASTA="/var/www/shell"
BASE="/var/www/shell/seguranca"

ATUAL="$BASE/hashes_atual.txt"
ANTERIOR="$BASE/hashes_anterior.txt"

cabecalho() {
	echo "========================="
	echo -e "${GREEN} VERIFICACAO DE INTEGRIDADE ${NC}"
	date
	echo "========================="

}

gerar_hashes() {
	find "$PASTA" -type f -exec sha256sum {} \; > "$ATUAL"
}

primeira_execucao() {
	if [ ! -f "$ANTERIOR" ]; then
		echo -e "${BLUE}primeira execucao - criando a baseline${NC}"
		cp "$ATUAL" "$ANTERIOR"
		exit 0
	fi

}

# diff --color=auto "$ANTERIOR" "$ATUAL"  so colore quando a saida e no terminal
comparar() {
	echo -e "${YELLOW}comparando integridade${NC}"
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

echo -e "${GREEN}===== [ FIM ] =====${NC}"

